<?php


    namespace Mjr\Library\EntitiesBundle\Entity\Customer;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\serializeTrait;


    /**
     * @ORM\Table(name="customer_address")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\Customer
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Address
    {
        use serializeTrait;
        use LogableTrait;
        use IdTrait;
        /**
         * @ORM\ManyToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Main", inversedBy="billingAddress", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="billing_customer_id", referencedColumnName="id")
         * @var Main
         * @Gedmo\Versioned
         */
        protected $BillingCustomer;
        /**
         * @ORM\ManyToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Main", inversedBy="shippingAddress", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="shipping_customer_id", referencedColumnName="id")
         * @var Main
         * @Gedmo\Versioned
         */
        protected $ShippingCustomer;
        /**
         * @ORM\Column(name="company_name", type="string", length=80, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $CompanyName;
        /**
         * @ORM\Column(name="first_name", type="string", length=80, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $FirstName;
        /**
         * @ORM\Column(name="last_name", type="string", length=80, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $LastName;
        /**
         * @ORM\Column(name="street", type="string", length=80, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Street;
        /**
         * @ORM\Column(name="zip_code", type="string", length=10, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $ZipCode;
        /**
         * @ORM\Column(name="city", type="string", length=80, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $City;
        /**
         * @ORM\Column(name="state", type="string", length=80, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $State;
        /**
         * @ORM\Column(name="country", type="string", length=5, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Country;
        /**
         * @ORM\Column(name="phone", type="string", length=30, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Phone;
        /**
         * @ORM\Column(name="mobil_phone", type="string", length=30, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $MobilPhone;
        /**
         * @ORM\Column(name="fax", type="string", length=30, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Fax;
        /**
         * @ORM\Column(name="email", type="string", length=255, nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Email;

        /**
         * @return string
         */
        public function getCompanyName()
        {
            return $this->CompanyName;
        }

        /**
         * @param string $CompanyName
         * @return $this
         */
        public function setCompanyName($CompanyName)
        {
            $this->CompanyName = $CompanyName;
            return $this;
        }

        /**
         * @return string
         */
        public function getFirstName()
        {
            return $this->FirstName;
        }

        /**
         * @param string $FirstName
         * @return $this
         */
        public function setFirstName($FirstName)
        {
            $this->FirstName = $FirstName;
            return $this;
        }

        /**
         * @return string
         */
        public function getLastName()
        {
            return $this->LastName;
        }

        /**
         * @param string $LastName
         * @return $this
         */
        public function setLastName($LastName)
        {
            $this->LastName = $LastName;
            return $this;
        }

        /**
         * @return string
         */
        public function getStreet()
        {
            return $this->Street;
        }

        /**
         * @param string $Street
         * @return $this
         */
        public function setStreet($Street)
        {
            $this->Street = $Street;
            return $this;
        }

        /**
         * @return string
         */
        public function getZipCode()
        {
            return $this->ZipCode;
        }

        /**
         * @param string $ZipCode
         * @return $this
         */
        public function setZipCode($ZipCode)
        {
            $this->ZipCode = $ZipCode;
            return $this;
        }

        /**
         * @return string
         */
        public function getCity()
        {
            return $this->City;
        }

        /**
         * @param string $City
         * @return $this
         */
        public function setCity($City)
        {
            $this->City = $City;
            return $this;
        }

        /**
         * @return string
         */
        public function getState()
        {
            return $this->State;
        }

        /**
         * @param string $State
         * @return $this
         */
        public function setState($State)
        {
            $this->State = $State;
            return $this;
        }

        /**
         * @return string
         */
        public function getCountry()
        {
            return $this->Country;
        }

        /**
         * @param string $Country
         * @return $this
         */
        public function setCountry($Country)
        {
            $this->Country = $Country;
            return $this;
        }

        /**
         * @return string
         */
        public function getPhone()
        {
            return $this->Phone;
        }

        /**
         * @param string $Phone
         * @return $this
         */
        public function setPhone($Phone)
        {
            $this->Phone = $Phone;
            return $this;
        }

        /**
         * @return string
         */
        public function getMobilPhone()
        {
            return $this->MobilPhone;
        }

        /**
         * @param string $MobilPhone
         * @return $this
         */
        public function setMobilPhone($MobilPhone)
        {
            $this->MobilPhone = $MobilPhone;
            return $this;
        }

        /**
         * @return string
         */
        public function getFax()
        {
            return $this->Fax;
        }

        /**
         * @param string $Fax
         * @return $this
         */
        public function setFax($Fax)
        {
            $this->Fax = $Fax;
            return $this;
        }

        /**
         * @return string
         */
        public function getEmail()
        {
            return $this->Email;
        }

        /**
         * @param string $Email
         * @return $this
         */
        public function setEmail($Email)
        {
            $this->Email = $Email;
            return $this;
        }

        /**
         * @return Main
         */
        public function getBillingCustomer()
        {
            return $this->BillingCustomer;
        }

        /**
         * @param Main $BillingCustomer
         * @return $this
         */
        public function setBillingCustomer($BillingCustomer)
        {
            $this->BillingCustomer = $BillingCustomer;
            return $this;
        }

        /**
         * @return Main
         */
        public function getShippingCustomer()
        {
            return $this->ShippingCustomer;
        }

        /**
         * @param Main $ShippingCustomer
         * @return $this
         */
        public function setShippingCustomer($ShippingCustomer)
        {
            $this->ShippingCustomer = $ShippingCustomer;
            return $this;
        }
    }