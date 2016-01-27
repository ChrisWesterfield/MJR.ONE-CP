<?php

namespace Mjr\Library\QueueBundle\Entities\Listener;

use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;

class StatisticsListener
{
    public function postGenerateSchema(GenerateSchemaEventArgs $event)
    {
        $schema = $event->getSchema();

        // When using multiple entity managers ignore events that are triggered by other entity managers.
        if ($event->getEntityManager()->getMetadataFactory()->isTransient('Mjr\Library\QueueBundle\Entities\System\Job')) {
            return;
        }

        $table = $schema->createTable('system_job_statistics');
        $table->addColumn('job_id', 'bigint', array('nullable' => false, 'unsigned' => true));
        $table->addColumn('characteristic', 'string', array('length' => 30, 'nullable' => false));
        $table->addColumn('createdAt', 'datetime', array('nullable' => false));
        $table->addColumn('charValue', 'float', array('nullable' => false));
        $table->setPrimaryKey(array('job_id', 'characteristic', 'createdAt'));
    }
}