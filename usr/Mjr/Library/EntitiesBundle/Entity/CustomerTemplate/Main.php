<?php


    namespace Mjr\Library\EntitiesBundle\Entity\CustomerTemplate;
    use DateTime;
    use Doctrine\Common\Collections\ArrayCollection;
    use Mjr\Library\EntitiesBundle\Repository\User\User;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\serializeTrait;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;

    /**
     * @ORM\Table(name="template_customer")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\CustomerTemplate
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Main
    {
        use serializeTrait;
        use LogableTrait;
        use IdTrait;

        /**
         * @ORM\Column(name="name", type="string", length=80, nullable=false)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Name;
        /**
         * @ORM\Column(name="reseller", type="boolean", nullable=false, options={"default"=false})
         * @var boolean
         * @Gedmo\Versioned
         */
        protected $Reseller;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Website", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var Website
         */
        protected $Website;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Mail", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var Mail
         */
        protected $Mail;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Dns", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var Dns
         */
        protected $Dns;
        /**
         * @ORM\Column(name="max_aps", type="integer", nullable=false, options={"default" = 0})
         * @var integer
         */
        protected $maxAps;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Database", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var Database
         */
        protected $Database;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\System", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var System
         */
        protected $System;

        /**
         * @return boolean
         */
        public function isReseller()
        {
            return $this->Reseller;
        }

        /**
         * @param boolean $Reseller
         * @return $this
         */
        public function setReseller($Reseller)
        {
            $this->Reseller = $Reseller;
            return $this;
        }

        /**
         * @return Website
         */
        public function getWebsite()
        {
            return $this->Website;
        }

        /**
         * @param Website $Website
         * @return $this
         */
        public function setWebsite($Website)
        {
            $this->Website = $Website;
            return $this;
        }

        /**
         * @return Mail
         */
        public function getMail()
        {
            return $this->Mail;
        }

        /**
         * @param Mail $Mail
         * @return $this
         */
        public function setMail($Mail)
        {
            $this->Mail = $Mail;
            return $this;
        }

        /**
         * @return Dns
         */
        public function getDns()
        {
            return $this->Dns;
        }

        /**
         * @param Dns $Dns
         * @return $this
         */
        public function setDns($Dns)
        {
            $this->Dns = $Dns;
            return $this;
        }

        /**
         * @return int
         */
        public function getMaxAps()
        {
            return $this->maxAps;
        }

        /**
         * @param int $maxAps
         * @return $this
         */
        public function setMaxAps($maxAps)
        {
            $this->maxAps = $maxAps;
            return $this;
        }

        /**
         * @return Database
         */
        public function getDatabase()
        {
            return $this->Database;
        }

        /**
         * @param Database $Database
         * @return $this
         */
        public function setDatabase($Database)
        {
            $this->Database = $Database;
            return $this;
        }

        /**
         * @return System
         */
        public function getSystem()
        {
            return $this->System;
        }

        /**
         * @param System $System
         * @return $this
         */
        public function setSystem($System)
        {
            $this->System = $System;
            return $this;
        }

        /**
         * @return string
         */
        public function getName()
        {
            return $this->Name;
        }

        /**
         * @param string $Name
         * @return $this
         */
        public function setName($Name)
        {
            $this->Name = $Name;
            return $this;
        }

    }