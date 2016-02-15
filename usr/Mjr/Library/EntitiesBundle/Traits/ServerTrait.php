<?php

    namespace Mjr\Library\EntitiesBundle\Traits;

    use Mjr\Library\EntitiesBundle\Entity\Host\Main;

    trait ServerTrait
    {
        /**
         * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="server_id", referencedColumnName="id")
         * @var Main
         */
        protected $Server;

        /**
         * @return Main
         */
        public function getServer()
        {
            return $this->Server;
        }

        /**
         * @param Main $Server
         * @return $this
         */
        public function setServer($Server)
        {
            $this->Server = $Server;
            return $this;
        }
    }