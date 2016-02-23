<?php

    namespace Mjr\Library\EntitiesBundle\Traits;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * Class ActiveTrait
     * @package Mjr\Library\EntitiesBundle\Traits
     * @author Chris Westerfield <chris@mjr.one>
     */
    trait  ActiveTrait
    {
        /**
         * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"=false})
         * @var boolean
         */
        protected $active;

        /**
         * @return boolean
         */
        public function isActive()
        {
            return $this->active;
        }

        /**
         * @param boolean $active
         * @return $this
         */
        public function setActive($active)
        {
            $this->active = $active;
            return $this;
        }

    }