<?php


    namespace Mjr\Library\EntitiesBundle\Library\Traits;
    use Symfony\Component\DependencyInjection\ContainerInterface;

    /**
     * Class ContainerEntityTrait
     *
     * @package Mjr\Library\EntitiesBundle\Traits
     * @trait
     * @package OmegaDev\LibraryBundle\Entity
     * @author Chris Westerfield <westerfield.chris@gmail.com>
     */
    trait ContainerEntityTrait
    {
        /**
         * @return ContainerInterface
         */
        public function getContainer()
        {
            return $this->container;
        }

        /**
         * @param ContainerInterface $container
         * @return $this
         */
        public function setContainer($container)
        {
            $this->container = $container;
            return $this;
        }
    }