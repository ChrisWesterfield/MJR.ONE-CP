<?php

namespace Mjr\Library\QueueBundle\Command;

use Mjr\Library\QueueBundle\Entities\System\Job;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class MarkJobIncompleteCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('job-queue:mark-incomplete')
            ->setDescription('Internal command (do not use). It marks jobs as incomplete.')
            ->addArgument('job-id', InputArgument::REQUIRED, 'The ID of the Job.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $c = $this->getContainer();

        $em = $c->get('doctrine')->getManagerForClass('MjrLibraryQueueBundle:Job');
        $repo = $em->getRepository('MjrLibraryQueueBundle:Job');

        $repo->closeJob($em->find('MjrLibraryQueueBundle:Job', $input->getArgument('job-id')), Job::STATE_INCOMPLETE);
    }
}