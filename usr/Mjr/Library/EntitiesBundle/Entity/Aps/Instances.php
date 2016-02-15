<?php

    namespace Mjr\Library\EntitiesBundle\Entity\Aps;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Traits\CustomerTrait;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

    /**
     * @ORM\Table(name="aps_instances")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\Aps
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Instances
    {
        use SystemGroupTrait;
        use SystemUserTrait;
        use IdTrait;
        use ServerTrait;
        use CustomerTrait;
        use LogableTrait;
        /**
         * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Aps\InstancesSettings", mappedBy="Instance", fetch="EXTRA_LAZY")
         */
        protected $InstanceSettings;
        /**
         * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Aps\Packages", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="package_id", referencedColumnName="id")
         * @var Packages
         */
        protected $Package;
        /**
         * @ORM\Column(name="instance_status", type="integer", nullable=false)
         * @Gedmo\Versioned
         * @var integer
         */
        protected $InstanceStatus;

        /**
         * @return Packages
         */
        public function getPackage()
        {
            return $this->Package;
        }

        /**
         * @param Packages $Package
         * @return $this
         */
        public function setPackage($Package)
        {
            $this->Package = $Package;
            return $this;
        }

        /**
         * @return int
         */
        public function getInstanceStatus()
        {
            return $this->InstanceStatus;
        }

        /**
         * @param int $InstanceStatus
         * @return $this
         */
        public function setInstanceStatus($InstanceStatus)
        {
            $this->InstanceStatus = $InstanceStatus;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getInstanceSettings()
        {
            return $this->InstanceSettings;
        }

        /**
         * @param mixed $InstanceSettings
         * @return $this
         */
        public function setInstanceSettings($InstanceSettings)
        {
            $this->InstanceSettings = $InstanceSettings;
            return $this;
        }
    }