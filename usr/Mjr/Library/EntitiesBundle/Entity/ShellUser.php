<?php

    namespace Mjr\Library\EntitiesBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Entity\Web\WebDomain;
    use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

    /**
     * @ORM\Table(name="shell_user")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity
     * @author Chris Westerfield <chris@mjr.one>
     */
    class ShellUser
    {
        use IdTrait;
        use SystemGroupTrait;
        use SystemUserTrait;
        use ServerTrait;
        use ActiveTrait;
        use LogableTrait;
        /**
         * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Customer\Main", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
         */
        protected $Customer;
        /**
         * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", inversedBy="ShellUsers", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
         * @var WebDomain
         */
        protected $Domain;
        /**
         * @ORM\Column(name="username", type="string", length=255, nullable=false)
         * @var string
         */
        protected $Username;
        /**
         * @ORM\Column(name="prefix", type="string", length=255, nullable=true)
         * @var string
         */
        protected $Prefix;
        /**
         * @ORM\Column(name="password", type="string", length=255, nullable=true)
         * @var string
         */
        protected $Password;
        /**
         * @ORM\Column(name="quota_size", type="bigint", nullable=true, precision=20)
         * @var integer
         */
        protected $QuotaSize;
        /**
         * @ORM\Column(name="puser", type="string", length=255, nullable=true)
         * @var string
         */
        protected $PUser;
        /**
         * @ORM\Column(name="pgroup", type="string",length=255, nullable=true)
         * @var string
         */
        protected $PGroup;
        /**
         * @ORM\Column(name="shell", type="string", length=255, nullable=false, options={"default"="/bin/bash"})
         * @var string
         */
        protected $Shell;
        /**
         * @ORM\Column(name="dir", type="string", length=255, nullable=true)
         * @var string
         */
        protected $Dir;
        /**
         * @ORM\Column(name="chroot", type="boolean", length=255, nullable=false, options={"default"=false})
         * @var string
         */
        protected $Chroot;
        /**
         * @ORM\Column(name="ssh_public_key", type="text", nullable=true)
         * @var string
         */
        protected $SshPublicKey;

        /**
         * @return mixed
         */
        public function getCustomer()
        {
            return $this->Customer;
        }

        /**
         * @param mixed $Customer
         * @return $this
         */
        public function setCustomer($Customer)
        {
            $this->Customer = $Customer;
            return $this;
        }

        /**
         * @return string
         */
        public function getUsername()
        {
            return $this->Username;
        }

        /**
         * @param string $Username
         * @return $this
         */
        public function setUsername($Username)
        {
            $this->Username = $Username;
            return $this;
        }

        /**
         * @return string
         */
        public function getPrefix()
        {
            return $this->Prefix;
        }

        /**
         * @param string $Prefix
         * @return $this
         */
        public function setPrefix($Prefix)
        {
            $this->Prefix = $Prefix;
            return $this;
        }

        /**
         * @return string
         */
        public function getPassword()
        {
            return $this->Password;
        }

        /**
         * @param string $Password
         * @return $this
         */
        public function setPassword($Password)
        {
            $this->Password = $Password;
            return $this;
        }

        /**
         * @return int
         */
        public function getQuotaSize()
        {
            return $this->QuotaSize;
        }

        /**
         * @param int $QuotaSize
         * @return $this
         */
        public function setQuotaSize($QuotaSize)
        {
            $this->QuotaSize = $QuotaSize;
            return $this;
        }

        /**
         * @return string
         */
        public function getPUser()
        {
            return $this->PUser;
        }

        /**
         * @param string $PUser
         * @return $this
         */
        public function setPUser($PUser)
        {
            $this->PUser = $PUser;
            return $this;
        }

        /**
         * @return string
         */
        public function getPGroup()
        {
            return $this->PGroup;
        }

        /**
         * @param string $PGroup
         * @return $this
         */
        public function setPGroup($PGroup)
        {
            $this->PGroup = $PGroup;
            return $this;
        }

        /**
         * @return string
         */
        public function getShell()
        {
            return $this->Shell;
        }

        /**
         * @param string $Shell
         * @return $this
         */
        public function setShell($Shell)
        {
            $this->Shell = $Shell;
            return $this;
        }

        /**
         * @return string
         */
        public function getDir()
        {
            return $this->Dir;
        }

        /**
         * @param string $Dir
         * @return $this
         */
        public function setDir($Dir)
        {
            $this->Dir = $Dir;
            return $this;
        }

        /**
         * @return string
         */
        public function getChroot()
        {
            return $this->Chroot;
        }

        /**
         * @param string $Chroot
         * @return $this
         */
        public function setChroot($Chroot)
        {
            $this->Chroot = $Chroot;
            return $this;
        }

        /**
         * @return string
         */
        public function getSshPublicKey()
        {
            return $this->SshPublicKey;
        }

        /**
         * @param string $SshPublicKey
         * @return $this
         */
        public function setSshPublicKey($SshPublicKey)
        {
            $this->SshPublicKey = $SshPublicKey;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getDomain()
        {
            return $this->Domain;
        }

        /**
         * @param mixed $Domain
         * @return $this
         */
        public function setDomain($Domain)
        {
            $this->Domain = $Domain;
            return $this;
        }



    }