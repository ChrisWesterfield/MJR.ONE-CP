<?php


    namespace Mjr\Library\NavigationBundle\Entity;
    use Doctrine\ORM\EntityRepository;
    use Mjr\Library\EntitiesBundle\Traits\SortableRepositoryTrait;


    /**
     * UserRepository
     *
     * This class was generated by the Doctrine ORM. Add your own custom
     * repository methods below.
     * @author Chris Westerfield <chris@spectware.com>
     */
    class TreeRepository extends EntityRepository
    {
        use SortableRepositoryTrait;
    }