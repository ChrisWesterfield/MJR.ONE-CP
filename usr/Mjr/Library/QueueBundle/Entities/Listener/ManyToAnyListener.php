<?php

namespace Mjr\Library\QueueBundle\Entities\Listener;
use Doctrine\Common\Util\ClassUtils;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;
use Mjr\Library\QueueBundle\Entities\System\Job;
use ReflectionProperty;
use RuntimeException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Provides many-to-any association support for jobs.
 *
 * This listener only implements the minimal support for this feature. For
 * example, currently we do not support any modification of a collection after
 * its initial creation.
 *
 * @see http://docs.jboss.org/hibernate/orm/4.1/javadocs/org/hibernate/annotations/ManyToAny.html
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class ManyToAnyListener
{
    private $registry;
    private $ref;

    public function __construct(RegistryInterface $registry)
    {
        $this->registry = $registry;
        $this->ref = new ReflectionProperty('Mjr\Library\QueueBundle\Entities\System\Job', 'relatedEntities');
        $this->ref->setAccessible(true);
    }

    public function postLoad(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();
        if ( ! $entity instanceof Job)
        {
            return;
        }

        $this->ref->setValue($entity, new PersistentRelatedEntitiesCollection($this->registry, $entity));
    }

    public function preRemove(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();
        if ( ! $entity instanceof Job)
        {
            return;
        }

        $con = $event->getEntityManager()->getConnection();
        $sql = "DELETE FROM system_job_related_entities WHERE job_id = :id";
        $con->executeUpdate($sql, array(
            'id' => $entity->getId(),
        ));
    }

    public function postPersist(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();
        if ( ! $entity instanceof Job) {
            return;
        }

        $con = $event->getEntityManager()->getConnection();
        foreach ($this->ref->getValue($entity) as $relatedEntity) {
            $relClass = ClassUtils::getClass($relatedEntity);
            $relId = $this->registry->getManagerForClass($relClass)->getMetadataFactory()->getMetadataFor($relClass)->getIdentifierValues($relatedEntity);
            asort($relId);

            if ( ! $relId) {
                throw new RuntimeException('The identifier for the related entity "'.$relClass.'" was empty.');
            }
            $sql = "INSERT INTO system_job_related_entities (job_id, related_class, related_id) VALUES (:jobId, :relClass, :relId)";
            $con->executeUpdate($sql, array(
                'jobId' => $entity->getId(),
                'relClass' => $relClass,
                'relId' => json_encode($relId),
            ));
        }
    }

    public function postGenerateSchema(GenerateSchemaEventArgs $event)
    {
        $schema = $event->getSchema();

        // When using multiple entity managers ignore events that are triggered by other entity managers.
        if ($event->getEntityManager()->getMetadataFactory()->isTransient('Mjr\Library\QueueBundle\Entities\System\Job')) {
            return;
        }

        $table = $schema->createTable('system_job_related_entities');
        $table->addColumn('job_id', 'bigint', array('nullable' => false, 'unsigned' => true));
        $table->addColumn('related_class', 'string', array('nullable' => false, 'length' => '150'));
        $table->addColumn('related_id', 'string', array('nullable' => false, 'length' => '100'));
        $table->setPrimaryKey(array('job_id', 'related_class', 'related_id'));
        $table->addForeignKeyConstraint('system_jobs', array('job_id'), array('id'));
    }
}