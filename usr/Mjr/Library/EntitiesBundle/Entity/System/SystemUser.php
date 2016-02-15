<?php

    namespace Mjr\Library\EntitiesBundle\Entity\System;

    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

    /**
     * @ORM\Table(name="system_users")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\System
     * @author Chris Westerfield <chris@mjr.one>
     */
    class SystemUser
    {
        use IdTrait;
        use LogableTrait;
        /**
         * @ORM\Column(name="system_user_id", type="integer", nullable=false)
         * @var integer
         * @Gedmo\Versioned
         */
        protected $SystemUserId;
        /**
         * @ORM\Column(name="system_user_permission", type="string", length=50, nullable=false)
         * @var string
         * @Gedmo\Versioned
         */
        protected $SystemUserPermission;

        /**
         *  @ORM\Column(name="system_permission_other", type="string", length=50, nullable=false)
         *  @var string
         * @Gedmo\Versioned
         */
        protected $SystemPermissionOther;

        /**
         * @return int
         */
        public function getSystemUserId()
        {
            return $this->SystemUserId;
        }

        /**
         * @param int $SystemUserId
         * @return $this
         */
        public function setSystemUserId($SystemUserId)
        {
            $this->SystemUserId = $SystemUserId;
            return $this;
        }

        /**
         * @return int
         */
        public function getSystemUserPermission()
        {
            return $this->SystemUserPermission;
        }

        /**
         * @param int $SystemUserPermission
         * @return $this
         */
        public function setSystemUserPermission($SystemUserPermission)
        {
            $this->SystemUserPermission = $SystemUserPermission;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getSystemPermissionOther()
        {
            return $this->SystemPermissionOther;
        }

        /**
         * @param mixed $SystemPermissionOther
         * @return $this
         */
        public function setSystemPermissionOther($SystemPermissionOther)
        {
            $this->SystemPermissionOther = $SystemPermissionOther;
            return $this;
        }
    }