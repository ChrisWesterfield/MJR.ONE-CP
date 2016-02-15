<?php

    namespace Mjr\Library\EntitiesBundle\Traits;
    use Doctrine\ORM\EntityManager;
    use Doctrine\ORM\Mapping\ClassMetadata;
    use Gedmo\Sortable\SortableListener;

    /**
     * Class SortableRepositoryTrait
     *
     * @package Mjr\Library\EntitiesBundle\Traits
     * @trait
     * @author Chris Westerfield <chris@mjr.one>
     */
    trait SortableRepositoryTrait
    {
        /**
         * Sortable listener on event manager
         *
         * @var SortableListener
         */
        protected $sortableListener = null;

        /**
         * @var array|null
         */
        protected $sortableConfig = null;
        /**
         * @var null
         */
        protected $sortableMeta = null;

        /**
         * SortableRepositoryTrait constructor.
         *
         * @param \Doctrine\ORM\EntityManager         $em
         * @param \Doctrine\ORM\Mapping\ClassMetadata $class
         */
        public function __construct(EntityManager $em, ClassMetadata $class)
        {
            parent::__construct($em, $class);
            $sortableListener = null;
            foreach ($em->getEventManager()->getListeners() as $event => $listeners) {
                foreach ($listeners as $hash => $listener) {
                    if ($listener instanceof SortableListener) {
                        $sortableListener = $listener;
                        break;
                    }
                }
                if ($sortableListener) {
                    break;
                }
            }

            if (is_null($sortableListener)) {
                throw new \Gedmo\Exception\InvalidMappingException('This repository can be attached only to ORM sortable listener');
            }

            $this->sortableListener = $sortableListener;
            $this->sortableMeta = $this->getClassMetadata();
            $this->sortableConfig = $this->sortableListener->getConfiguration($this->_em, $this->sortableMeta->name);
        }

        /**
         * @param array $groupValues
         *
         * @return mixed
         */
        public function getBySortableGroupsQuery(array $groupValues = array())
        {
            return $this->getBySortableGroupsQueryBuilder($groupValues)->getQuery();
        }

        /**
         * @param array $groupValues
         *
         * @return mixed
         */
        public function getBySortableGroupsQueryBuilder(array $groupValues = array())
        {
            $groups = isset($this->sortableConfig['groups']) ? array_combine(array_values($this->sortableConfig['groups']), array_keys($this->sortableConfig['groups'])) : array();
            foreach ($groupValues as $name => $value) {
                if (!in_array($name, $this->sortableConfig['groups'])) {
                    throw new \InvalidArgumentException('Sortable group "'.$name.'" is not defined in Entity '.$this->sortableMeta->name);
                }
                unset($groups[$name]);
            }
            if (count($groups) > 0) {
                throw new \InvalidArgumentException(
                    'You need to specify values for the following groups to select by sortable groups: '.implode(", ", array_keys($groups)));
            }

            $qb = $this->createQueryBuilder('n');
            $i = 1;
            foreach ($groupValues as $group => $value) {
                $qb->andWhere('n.'.$group.' = :group'.$i)
                   ->setParameter('group'.$i, $value);
                $i++;
            }

            return $qb;
        }

        /**
         * @param array $groupValues
         *
         * @return mixed
         */
        public function getBySortableGroups(array $groupValues = array())
        {
            $query = $this->getBySortableGroupsQuery($groupValues);

            return $query->getResult();
        }

        /**
         * @param      $alias
         * @param null $indexBy
         *
         * @return mixed
         */
        public function createQueryBuilder($alias, $indexBy = null)
        {
            $qb = parent::createQueryBuilder($alias, $indexBy);

            $qb->orderBy($alias.'.'.$this->sortableConfig['position']);

            return $qb;
        }
    }