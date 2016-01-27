<?php

namespace Mjr\Library\QueueBundle;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MjrLibraryQueueBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new LinkGeneratorsPass());
    }

    public function boot()
    {
        if ( ! Type::hasType('mjr_library_queue_safe_object')) {
            Type::addType('mjr_library_queue_safe_object', 'Mjr\Library\QueueBundle\Entities\Type\SafeObjectType');
        }

        /** @var ManagerRegistry $registry*/
        $registry = $this->container->get('doctrine');
        foreach ($registry->getConnections() as $con)
        {
            if ($con instanceof Connection)
            {
                $con->getDatabasePlatform()->markDoctrineTypeCommented('mjr_library_queue_safe_object');
            }
        }
    }
}
