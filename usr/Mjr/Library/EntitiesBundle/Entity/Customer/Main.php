<?php


    namespace Mjr\Library\EntitiesBundle\Entity\Customer;
    use Doctrine\Common\Collections\ArrayCollection;
    use Mjr\Library\EntitiesBundle\Repository\User\User;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\serializeTrait;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;

    /**
     * @ORM\Table(name="customer_main")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\Customer
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Main
    {
        use serializeTrait;
        use LogableTrait;
        use IdTrait;
        /**
         * @ORM\Column(name="reseller", type="boolean", nullable=false, options={"default"=false})
         * @var boolean
         */
        protected $Reseller;
        /**
         * @ORM\Column(name="account_number",type="string", length=80, nullable=false)
         * @var string
         * @Gedmo\Versioned
         */
        protected $accountNumber;
        /**
         * @ORM\OneToMany(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Address", mappedBy="BillingCustomer", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $billingAddress;
        /**
         * @ORM\OneToMany(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Address", mappedBy="ShippingCustomer", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $shippingAddress;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Website", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var Website
         */
        protected $Website;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Mail", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var Mail
         */
        protected $Mail;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Dns", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var Dns
         */
        protected $Dns;
        /**
         * @ORM\Column(name="max_aps", type="integer", nullable=false, options={"default" = 0})
         * @var integer
         */
        protected $maxAps;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Database", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var Database
         */
        protected $Database;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\System", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var System
         */
        protected $System;
        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\User\User", inversedBy="Customer", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="system_user_id",referencedColumnName="id")
         * @var User
         */
        protected $SystemUser;
        /**
         * @ORM\OneToMany(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Payment", mappedBy="Customer", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $payment;
        /**
         * @ORM\Column(name="locked", type="boolean", options={"default"=false})
         * @var bool
         * @Gedmo\Versioned
         */
        protected $locked;
        /**
         * @ORM\Column(name="terminated", type="boolean", options={"default"=false})
         * @var bool
         * @Gedmo\Versioned
         */
        protected $terminated;

        public function __construct()
        {
            $this->billingAddress = new ArrayCollection();
            $this->shippingAddress = new ArrayCollection();
            $this->payment = new ArrayCollection();
        }

        /**
         * @return ArrayCollection
         */
        public function getBillingAddresses()
        {
            return $this->billingAddress;
        }

        /**
         * @param Address $address
         * @return bool
         */
        public function hasBillingAddress(Address $address)
        {
            return $this->billingAddress->contains($address);
        }

        /**
         * @param Address $address
         * @return $this
         */
        public function addBillingAddress(Address $address)
        {
            $this->billingAddress->add($address);
            return $this;
        }

        /**
         * @param Address $address
         * @return $this
         */
        public function removeBillingaddress(Address $address)
        {
            if($this->hasBillingAddress($address))
            {
                $this->billingAddress->removeElement($address);
            }
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getShippingAddresses()
        {
            return $this->shippingAddress;
        }

        /**
         * @param Address $address
         * @return bool
         */
        public function hasShippingAddresses(Address $address)
        {
            return $this->shippingAddress->contains($address);
        }

        /**
         * @param Address $address
         * @return $this
         */
        public function addShippingAddresses(Address $address)
        {
            $this->shippingAddress->add($address);
            return $this;
        }

        /**
         * @param Address $address
         * @return $this
         */
        public function removeShippingAddresses(Address $address)
        {
            if($this->hasShippingAddresses($address))
            {
                $this->shippingAddress->removeElement($address);
            }
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getPayments()
        {
            return $this->payment;
        }

        /**
         * @param Address $address
         * @return bool
         */
        public function hasPayment(Address $address)
        {
            return $this->payment->contains($address);
        }

        /**
         * @param Address $address
         * @return $this
         */
        public function addPayment(Address $address)
        {
            $this->payment->add($address);
            return $this;
        }

        /**
         * @param Address $address
         * @return $this
         */
        public function removePayment(Address $address)
        {
            if($this->hasPayment($address))
            {
                $this->payment->removeElement($address);
            }
            return $this;
        }

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
         * @return string
         */
        public function getAccountNumber()
        {
            return $this->accountNumber;
        }

        /**
         * @param string $accountNumber
         * @return $this
         */
        public function setAccountNumber($accountNumber)
        {
            $this->accountNumber = $accountNumber;
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
         * @return User
         */
        public function getSystemUser()
        {
            return $this->SystemUser;
        }

        /**
         * @param User $SystemUser
         * @return $this
         */
        public function setSystemUser($SystemUser)
        {
            $this->SystemUser = $SystemUser;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isLocked()
        {
            return $this->locked;
        }

        /**
         * @param boolean $locked
         * @return $this
         */
        public function setLocked($locked)
        {
            $this->locked = $locked;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isTerminated()
        {
            return $this->terminated;
        }

        /**
         * @param boolean $terminated
         * @return $this
         */
        public function setTerminated($terminated)
        {
            $this->terminated = $terminated;
            return $this;
        }

    }