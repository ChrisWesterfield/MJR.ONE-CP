<?php

    namespace Mjr\Library\EntitiesBundle\Entity\System;

    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

    /**
     * @ORM\Table(name="system_group")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\System
     * @author Chris Westerfield <chris@mjr.one>
     */
    class SystemGroup
    {
        use IdTrait;
        use LogableTrait;
        /**
         * @ORM\Column(name="system_group_id", type="integer", nullable=false)
         * @var integer
         * @Gedmo\Versioned
         */
        protected $SystemGroupId;
        /**
         * @ORM\Column(name="system_group_permission", type="string", length=50, nullable=false)
         * @var integer
         * @Gedmo\Versioned
         */
        protected $SystemGroupPermission;

        /**
         * @return int
         */
        public function getSystemGroupId()
        {
            return $this->SystemGroupId;
        }

        /**
         * @param int $SystemGroupId
         * @return $this
         */
        public function setSystemGroupId($SystemGroupId)
        {
            $this->SystemGroupId = $SystemGroupId;
            return $this;
        }

        /**
         * @return int
         */
        public function getSystemGroupPermission()
        {
            return $this->SystemGroupPermission;
        }

        /**
         * @param int $SystemGroupPermission
         * @return $this
         */
        public function setSystemGroupPermission($SystemGroupPermission)
        {
            $this->SystemGroupPermission = $SystemGroupPermission;
            return $this;
        }
    }