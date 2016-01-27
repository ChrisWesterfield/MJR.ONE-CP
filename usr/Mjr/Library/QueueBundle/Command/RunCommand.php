<?php

/*
 * Copyright 2012 Johannes M. Schmitt <schmittjoh@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace  Mjr\Library\QueueBundle\Command;

use Doctrine\ORM\EntityManager;
use Mjr\Library\QueueBundle\Entities\Repository\System\JobRepository;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Mjr\Library\QueueBundle\Exception\LogicException;
use Mjr\Library\QueueBundle\Exception\InvalidArgumentException;
use Mjr\Library\QueueBundle\Event\NewOutputEvent;
use Symfony\Component\Process\ProcessBuilder;
use Mjr\Library\QueueBundle\Entities\System\Job;
use  Mjr\Library\QueueBundle\Event\StateChangeEvent;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunCommand extends \Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand
{
    /** @var string */
    protected $env;

    /** @var boolean */
    protected $verbose;

    /** @var OutputInterface */
    protected $output;

    /** @var ManagerRegistry */
    protected $registry;

    /** @var EventDispatcher */
    protected $dispatcher;

    /** @var array */
    protected $runningJobs = array();

    /** @var bool */
    protected $shouldShutdown = false;

    /**
     * 
     */
    protected function configure()
    {
        $this
            ->setName('job-queue:run')
            ->setDescription('Runs jobs from the queue.')
            ->addOption('max-runtime', 'r', InputOption::VALUE_REQUIRED, 'The maximum runtime in seconds.', 900)
            ->addOption('max-concurrent-jobs', 'j', InputOption::VALUE_REQUIRED, 'The maximum number of concurrent jobs.', 4)
            ->addOption('idle-time', null, InputOption::VALUE_REQUIRED, 'Time to sleep when the queue ran out of jobs.', 2)
            ->addOption('queue', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'Restrict to one or more queues.', array())
            ->addOption('worker-name', null, InputOption::VALUE_REQUIRED, 'The name that uniquely identifies this worker process.')
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
        $startTime = time();

        $maxRuntime = (integer) $input->getOption('max-runtime');
        if ($maxRuntime <= 0) {
            throw new InvalidArgumentException('The maximum runtime must be greater than zero.');
        }

        if ($maxRuntime > 600) {
            $maxRuntime += mt_rand(-120, 120);
        }

        $maxJobs = (integer) $input->getOption('max-concurrent-jobs');
        if ($maxJobs <= 0) {
            throw new InvalidArgumentException('The maximum number of jobs per queue must be greater than zero.');
        }

        $idleTime = (integer) $input->getOption('idle-time');
        if ($idleTime <= 0) {
            throw new InvalidArgumentException('Time to sleep when idling must be greater than zero.');
        }

        $restrictedQueues = $input->getOption('queue');

        $workerName = $input->getOption('worker-name');
        if ($workerName === null) {
            $workerName = gethostname().'-'.getmypid();
        }

        if (strlen($workerName) > 50) {
            throw new \RuntimeException(sprintf(
                '"worker-name" must not be longer than 50 chars, but got "%s" (%d chars).',
                $workerName,
                strlen($workerName)
            ));
        }

        $this->env = $input->getOption('env');
        $this->verbose = $input->getOption('verbose');
        $this->output = $output;
        $this->registry = $this->getContainer()->get('doctrine');
        $this->dispatcher = $this->getContainer()->get('event_dispatcher');
        $this->getEntityManager()->getConnection()->getConfiguration()->setSQLLogger(null);

        if ($this->verbose) {
            $this->output->writeln('Cleaning up stale jobs');
        }

        $this->cleanUpStaleJobs($workerName);

        $this->runJobs(
            $workerName,
            $startTime,
            $maxRuntime,
            $idleTime,
            $maxJobs,
            $restrictedQueues,
            $this->getContainer()->getParameter('mjr_library_queue.queue_options_defaults'),
            $this->getContainer()->getParameter('mjr_library_queue.queue_options')
        );
    }

    /**
     * @param       $workerName
     * @param       $startTime
     * @param       $maxRuntime
     * @param       $idleTime
     * @param       $maxJobs
     * @param array $restrictedQueues
     * @param array $queueOptionsDefaults
     * @param array $queueOptions
     */
    protected function runJobs($workerName, $startTime, $maxRuntime, $idleTime, $maxJobs, array $restrictedQueues, array $queueOptionsDefaults, array $queueOptions)
    {
        $hasPcntl = extension_loaded('pcntl');

        if ($this->verbose) {
            $this->output->writeln('Running jobs');
        }

        if ($hasPcntl) {
            $this->setupSignalHandlers();
            if ($this->verbose) {
                $this->output->writeln('Signal Handlers have been installed.');
            }
        } elseif ($this->verbose) {
            $this->output->writeln('PCNTL extension is not available. Signals cannot be processed.');
        }

        while (true) {
            if ($hasPcntl) {
                pcntl_signal_dispatch();
            }

            if ($this->shouldShutdown || time() - $startTime > $maxRuntime) {
                break;
            }

            $this->checkRunningJobs();
            $this->startJobs($workerName, $idleTime, $maxJobs, $restrictedQueues, $queueOptionsDefaults, $queueOptions);

            $waitTimeInMs = mt_rand(500, 1000);
            usleep($waitTimeInMs * 1E3);
        }

        if ($this->verbose) {
            $this->output->writeln('Entering shutdown sequence, waiting for running jobs to terminate...');
        }

        while ( ! empty($this->runningJobs)) {
            sleep(5);
            $this->checkRunningJobs();
        }

        if ($this->verbose) {
            $this->output->writeln('All jobs finished, exiting.');
        }
    }

    /**
     * 
     */
    protected function setupSignalHandlers()
    {
        pcntl_signal(SIGTERM, function() {
            if ($this->verbose) {
                $this->output->writeln('Received SIGTERM signal.');
            }

            $this->shouldShutdown = true;
        });
    }

    /**
     * @param       $workerName
     * @param       $idleTime
     * @param       $maxJobs
     * @param array $restrictedQueues
     * @param array $queueOptionsDefaults
     * @param array $queueOptions
     */
    protected function startJobs($workerName, $idleTime, $maxJobs, array $restrictedQueues, array $queueOptionsDefaults, array $queueOptions)
    {
        $excludedIds = array();
        while (count($this->runningJobs) < $maxJobs) {
            $pendingJob = $this->getRepository()->findStartableJob(
                $workerName,
                $excludedIds,
                $this->getExcludedQueues($queueOptionsDefaults, $queueOptions, $maxJobs),
                $restrictedQueues
            );

            if (null === $pendingJob) {
                sleep($idleTime);

                return;
            }

            $this->startJob($pendingJob);
        }
    }

    /**
     * @param array $queueOptionsDefaults
     * @param array $queueOptions
     * @param       $maxConcurrentJobs
     *
     * @return array
     */
    protected function getExcludedQueues(array $queueOptionsDefaults, array $queueOptions, $maxConcurrentJobs)
    {
        $excludedQueues = array();
        foreach ($this->getRunningJobsPerQueue() as $queue => $count) {
            if ($count >= $this->getMaxConcurrentJobs($queue, $queueOptionsDefaults, $queueOptions, $maxConcurrentJobs)) {
                $excludedQueues[] = $queue;
            }
        }

        return $excludedQueues;
    }

    /**
     * @param       $queue
     * @param array $queueOptionsDefaults
     * @param array $queueOptions
     * @param       $maxConcurrentJobs
     *
     * @return int
     */
    protected function getMaxConcurrentJobs($queue, array $queueOptionsDefaults, array $queueOptions, $maxConcurrentJobs)
    {
        if (isset($queueOptions[$queue]['max_concurrent_jobs'])) {
            return (integer) $queueOptions[$queue]['max_concurrent_jobs'];
        }

        if (isset($queueOptionsDefaults['max_concurrent_jobs'])) {
            return (integer) $queueOptionsDefaults['max_concurrent_jobs'];
        }

        return $maxConcurrentJobs;
    }

    /**
     * @return array
     */
    protected function getRunningJobsPerQueue()
    {
        $runningJobsPerQueue = array();
        foreach ($this->runningJobs as $jobDetails) {
            /** @var Job $job */
            $job = $jobDetails['job'];

            $queue = $job->getQueue();
            if ( ! isset($runningJobsPerQueue[$queue])) {
                $runningJobsPerQueue[$queue] = 0;
            }
            $runningJobsPerQueue[$queue] += 1;
        }

        return $runningJobsPerQueue;
    }

    /**
     * @throws \Exception
     */
    protected function checkRunningJobs()
    {
        foreach ($this->runningJobs as $i => &$data) {
            $newOutput = substr($data['process']->getOutput(), $data['output_pointer']);
            $data['output_pointer'] += strlen($newOutput);

            $newErrorOutput = substr($data['process']->getErrorOutput(), $data['error_output_pointer']);
            $data['error_output_pointer'] += strlen($newErrorOutput);

            if ( ! empty($newOutput)) {
                $event = new NewOutputEvent($data['job'], $newOutput, NewOutputEvent::TYPE_STDOUT);
                $this->dispatcher->dispatch('library_job_queue.new_job_output', $event);
                $newOutput = $event->getNewOutput();
            }

            if ( ! empty($newErrorOutput)) {
                $event = new NewOutputEvent($data['job'], $newErrorOutput, NewOutputEvent::TYPE_STDERR);
                $this->dispatcher->dispatch('library_job_queue.new_job_output', $event);
                $newErrorOutput = $event->getNewOutput();
            }

            if ($this->verbose) {
                if ( ! empty($newOutput)) {
                    $this->output->writeln('Job '.$data['job']->getId().': '.str_replace("\n", "\nJob ".$data['job']->getId().": ", $newOutput));
                }

                if ( ! empty($newErrorOutput)) {
                    $this->output->writeln('Job '.$data['job']->getId().': '.str_replace("\n", "\nJob ".$data['job']->getId().": ", $newErrorOutput));
                }
            }

            // Check whether this process exceeds the maximum runtime, and terminate if that is
            // the case.
            $runtime = time() - $data['job']->getStartedAt()->getTimestamp();
            if ($data['job']->getMaxRuntime() > 0 && $runtime > $data['job']->getMaxRuntime()) {
                $data['process']->stop(5);

                $this->output->writeln($data['job'].' terminated; maximum runtime exceeded.');
                $this->getRepository()->closeJob($data['job'], Job::STATE_TERMINATED);
                unset($this->runningJobs[$i]);

                continue;
            }

            if ($data['process']->isRunning()) {
                // For long running processes, it is nice to update the output status regularly.
                $data['job']->addOutput($newOutput);
                $data['job']->addErrorOutput($newErrorOutput);
                $data['job']->checked();
                $em = $this->getEntityManager();
                $em->persist($data['job']);
                $em->flush($data['job']);

                continue;
            }

            $this->output->writeln($data['job'].' finished with exit code '.$data['process']->getExitCode().'.');

            // If the Job exited with an exception, let's reload it so that we
            // get access to the stack trace. This might be useful for listeners.
            $this->getEntityManager()->refresh($data['job']);

            $data['job']->setExitCode($data['process']->getExitCode());
            $data['job']->setOutput($data['process']->getOutput());
            $data['job']->setErrorOutput($data['process']->getErrorOutput());
            $data['job']->setRuntime(time() - $data['start_time']);

            $newState = 0 === $data['process']->getExitCode() ? Job::STATE_FINISHED : Job::STATE_FAILED;
            $this->getRepository()->closeJob($data['job'], $newState);
            unset($this->runningJobs[$i]);
        }

        gc_collect_cycles();
    }

    /**
     * @param \Mjr\Library\QueueBundle\Entity\System\Job $job
     *
     * @throws \Exception
     */
    protected function startJob(Job $job)
    {
        $event = new StateChangeEvent($job, Job::STATE_RUNNING);
        $this->dispatcher->dispatch('library_job_queue.job_state_change', $event);
        $newState = $event->getNewState();

        if (Job::STATE_CANCELED === $newState) {
            $this->getRepository()->closeJob($job, Job::STATE_CANCELED);

            return;
        }

        if (Job::STATE_RUNNING !== $newState) {
            throw new LogicException(sprintf('Unsupported new state "%s".', $newState));
        }

        $job->setState(Job::STATE_RUNNING);
        $em = $this->getEntityManager();
        $em->persist($job);
        $em->flush($job);

        $pb = $this->getCommandProcessBuilder();
        $pb
            ->add($job->getCommand())
            ->add('--job-id='.$job->getId())
        ;

        foreach ($job->getArgs() as $arg) {
            $pb->add($arg);
        }
        $proc = $pb->getProcess();
        $proc->start();
        $this->output->writeln(sprintf('Started %s.', $job));

        $this->runningJobs[] = array(
            'process' => $proc,
            'job' => $job,
            'start_time' => time(),
            'output_pointer' => 0,
            'error_output_pointer' => 0,
        );
    }

    /**
     * Cleans up stale jobs.
     *
     * A stale job is a job where this command has exited with an error
     * condition. Although this command is very robust, there might be cases
     * where it might be terminated abruptly (like a PHP segfault, a SIGTERM signal, etc.).
     *
     * In such an error condition, these jobs are cleaned-up on restart of this command.
     */
    protected function cleanUpStaleJobs($workerName)
    {
        /** @var Job[] $staleJobs */
        $dql = <<<DQL
SELECT j FROM MjrLibraryQueueBundle:Job j WHERE j.state = :running AND (j.workerName = :worker OR j.workerName IS NULL)
DQL;
        $staleJobs = $this->getEntityManager()->createQuery($dql)
            ->setParameter('worker', $workerName)
            ->setParameter('running', Job::STATE_RUNNING)
            ->getResult();

        foreach ($staleJobs as $job) {
            // If the original job has retry jobs, then one of them is still in
            // running state. We can skip the original job here as it will be
            // processed automatically once the retry job is processed.
            if ( ! $job->isRetryJob() && count($job->getRetryJobs()) > 0) {
                continue;
            }

            $pb = $this->getCommandProcessBuilder();
            $pb
                ->add('mjr_library_queue:mark-incomplete')
                ->add($job->getId())
                ->add('--env='.$this->env)
                ->add('--verbose')
            ;

            // We use a separate process to clean up.
            $proc = $pb->getProcess();
            if (0 !== $proc->run()) {
                $ex = new ProcessFailedException($proc);

                $this->output->writeln(sprintf('There was an error when marking %s as incomplete: %s', $job, $ex->getMessage()));
            }
        }
    }

    /**
     * @return ProcessBuilder
     */
    protected function getCommandProcessBuilder()
    {
        $pb = new ProcessBuilder();

        // PHP wraps the process in "sh -c" by default, but we need to control
        // the process directly.
        if ( ! defined('PHP_WINDOWS_VERSION_MAJOR')) {
            $pb->add('exec');
        }

        $pb
            ->add('php')
            ->add($this->getContainer()->getParameter('kernel.root_dir').'/bin/console')
            ->add('--env='.$this->env)
        ;

        if ($this->verbose) {
            $pb->add('--verbose');
        }

        return $pb;
    }

    /**
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->registry->getManagerForClass('MjrLibraryQueueBundle:Job');
    }

    /**
     * @return JobRepository
     */
    protected function getRepository()
    {
        return $this->getEntityManager()->getRepository('MjrLibraryQueueBundle:Job');
    }
}
