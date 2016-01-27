<?php

namespace  Mjr\Library\QueueBundle\Command;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Mjr\Library\QueueBundle\Entities\System\Job;
use Mjr\Library\QueueBundle\Entities\Repository\System\JobRepository;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CleanUpCommand extends ContainerAwareCommand
{
    /**
     * 
     */
    protected function configure()
    {
        $this
            ->setName('job-queue:clean-up')
            ->setDescription('Cleans up jobs which exceed the maximum retention time.')
            ->addOption('max-retention', null, InputOption::VALUE_REQUIRED, 'The maximum retention time (value must be parsable by DateTime).', '7 days')
            ->addOption('max-retention-succeeded', null, InputOption::VALUE_REQUIRED, 'The maximum retention time for succeeded jobs (value must be parsable by DateTime).', '1 hour')
            ->addOption('per-call', null, InputOption::VALUE_REQUIRED, 'The maximum number of jobs to clean-up per call.', 1000)
        ;
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ManagerRegistry $registry */
        $registry = $this->getContainer()->get('doctrine');

        /** @var EntityManager $em */
        $em = $registry->getManagerForClass('MjrLibraryQueueBundle:Job');
        $con = $em->getConnection();

        $this->cleanUpExpiredJobs($em, $con, $input);
        $this->collectStaleJobs($em);
    }

    /**
     * @param \Doctrine\ORM\EntityManager $em
     *
     * @throws \Exception
     */
    protected function collectStaleJobs(EntityManager $em)
    {
        /** @var JobRepository $repository */
        $repository = $em->getRepository(Job::class);

        foreach ($this->findStaleJobs($em) as $job) {
            if ($job->isRetried()) {
                continue;
            }

            $repository->closeJob($job, Job::STATE_INCOMPLETE);
        }
    }

    /**
     * @return Job[]
     */
    protected function findStaleJobs(EntityManager $em)
    {
        $excludedIds = array(-1);

        do {
            $em->clear();

            /** @var Job $job */
            $dql = <<<DQL
SELECT j FROM MjrLibraryQueueBundle:Job j WHERE j.state = :running AND j.workerName IS NOT NULL AND j.checkedAt < :maxAge AND j.id NOT IN (:excludedIds)
DQL;
            $job = $em->createQuery($dql)
                ->setParameter('running', Job::STATE_RUNNING)
                ->setParameter('maxAge', new \DateTime('-5 minutes'), 'datetime')
                ->setParameter('excludedIds', $excludedIds)
                ->setMaxResults(1)
                ->getOneOrNullResult();

            if ($job !== null) {
                $excludedIds[] = $job->getId();

                yield $job;
            }
        } while ($job !== null);
    }

    /**
     * @param \Doctrine\ORM\EntityManager                     $em
     * @param \Doctrine\DBAL\Connection                       $con
     * @param \Symfony\Component\Console\Input\InputInterface $input
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Exception
     */
    protected function cleanUpExpiredJobs(EntityManager $em, Connection $con, InputInterface $input)
    {
        $sql = "SELECT 1 FROM system_job_dependencies WHERE dest_job_id = :id";
        $incomingDepsSql = $con->getDatabasePlatform()->modifyLimitQuery($sql, 1);

        $count = 0;
        foreach ($this->findExpiredJobs($em, $input) as $job) {
            /** @var Job $job */

            $count++;

            $result = $con->executeQuery($incomingDepsSql, array('id' => $job->getId()));
            if ($result->fetchColumn() !== false) {
                $em->transactional(function() use ($em, $job) {
                    $this->resolveDependencies($em, $job);
                    $em->remove($job);
                });

                continue;
            }

            $em->remove($job);

            if ($count >= $input->getOption('per-call')) {
                break;
            }
        }

        $em->flush();
    }

    /**
     * @param \Doctrine\ORM\EntityManager        $em
     * @param \Mjr\Library\QueueBundle\Entities\System\Job $job
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Exception
     */
    protected function resolveDependencies(EntityManager $em, Job $job)
    {
        // If this job has failed, or has otherwise not succeeded, we need to set the
        // incoming dependencies to failed if that has not been done already.
        if ( ! $job->isFinished()) {
            /** @var JobRepository $repository */
            $repository = $em->getRepository(Job::class);
            foreach ($repository->findIncomingDependencies($job) as $incomingDep) {
                if ($incomingDep->isInFinalState()) {
                    continue;
                }

                $finalState = Job::STATE_CANCELED;
                if ($job->isRunning()) {
                    $finalState = Job::STATE_FAILED;
                }

                $repository->closeJob($incomingDep, $finalState);
            }
        }

        $sql = "DELETE FROM system_job_dependencies WHERE dest_job_id = :id";
        $em->getConnection()->executeUpdate($sql, array('id' => $job->getId()));
    }

    /**
     * @param \Doctrine\ORM\EntityManager                     $em
     * @param \Symfony\Component\Console\Input\InputInterface $input
     *
     * @return \Generator
     */
    protected function findExpiredJobs(EntityManager $em, InputInterface $input)
    {
        $succeededJobs = function(array $excludedIds) use ($em, $input) {
            $dql = <<<DQL
SELECT j FROM MjrLibraryQueueBundle:Job j WHERE j.closedAt < :maxRetentionTime AND j.originalJob IS NULL AND j.state = :succeeded AND j.id NOT IN (:excludedIds)
DQL;
            return $em->createQuery($dql)
                ->setParameter('maxRetentionTime', new \DateTime('-'.$input->getOption('max-retention-succeeded')))
                ->setParameter('excludedIds', $excludedIds)
                ->setParameter('succeeded', Job::STATE_FINISHED)
                ->setMaxResults(100)
                ->getResult();
        };
        foreach ($this->whileResults($succeededJobs) as $job) {
            yield $job;
        }

        $finishedJobs = function(array $excludedIds) use ($em, $input) {
            $dql = <<<DQL
SELECT j FROM MjrLibraryQueueBundle:Job j WHERE j.closedAt < :maxRetentionTime AND j.originalJob IS NULL AND j.id NOT IN (:excludedIds)
DQL;
            return $em->createQuery($dql)
                ->setParameter('maxRetentionTime', new \DateTime('-'.$input->getOption('max-retention')))
                ->setParameter('excludedIds', $excludedIds)
                ->setMaxResults(100)
                ->getResult();
        };
        foreach ($this->whileResults($finishedJobs) as $job) {
            yield $job;
        }

        $canceledJobs = function(array $excludedIds) use ($em, $input) {
            $dql = <<<DQL
SELECT j FROM MjrLibraryQueueBundle:Job j WHERE j.state = :canceled AND j.createdAt < :maxRetentionTime AND j.originalJob IS NULL AND j.id NOT IN (:excludedIds)
DQL;
            return $em->createQuery($dql)
                ->setParameter('maxRetentionTime', new \DateTime('-'.$input->getOption('max-retention')))
                ->setParameter('canceled', Job::STATE_CANCELED)
                ->setParameter('excludedIds', $excludedIds)
                ->setMaxResults(100)
                ->getResult();
        };
        foreach ($this->whileResults($canceledJobs) as $job) {
            yield $job;
        }
    }

    /**
     * @param callable $resultProducer
     *
     * @return \Generator
     */
    protected function whileResults(callable $resultProducer)
    {
        $excludedIds = array(-1);

        do {
            /** @var Job[] $jobs */
            $jobs = $resultProducer($excludedIds);
            foreach ($jobs as $job) {
                $excludedIds[] = $job->getId();
                yield $job;
            }
        } while ( ! empty($jobs));
    }
}