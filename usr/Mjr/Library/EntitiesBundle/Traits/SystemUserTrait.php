<?php


    namespace Mjr\Library\EntitiesBundle\Traits;
    use Doctrine\ORM\Mapping as ORM;

    trait SystemUserTrait
    {

        /**
         * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\System\SystemUser", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="system_user_id", referencedColumnName="id")
         */
        protected $SystemUserId;

        /**
         * @return mixed
         */
        public function getSystemUserId()
        {
            return $this->SystemUserId;
        }

        /**
         * @param mixed $SystemUserId
         * @return $this
         */
        public function setSystemUserId($SystemUserId)
        {
            $this->SystemUserId = $SystemUserId;
            return $this;
        }


    }