<?php


    namespace Mjr\Library\EntitiesBundle\Traits;
    use Doctrine\ORM\Mapping as ORM;

    trait SystemGroupTrait
    {

        /**
         * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\System\SystemGroup", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="system_group_id", referencedColumnName="id")
         */
        protected $SystemGroupId;

        /**
         * @return mixed
         */
        public function getSystemGroupId()
        {
            return $this->SystemGroupId;
        }

        /**
         * @param mixed $SystemGroupId
         * @return $this
         */
        public function setSystemGroupId($SystemGroupId)
        {
            $this->SystemGroupId = $SystemGroupId;
            return $this;
        }


    }