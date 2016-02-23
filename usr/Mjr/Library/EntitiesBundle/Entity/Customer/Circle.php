<?php

    namespace Mjr\Library\EntitiesBundle\Entity\Customer;
    use Doctrine\Common\Collections\ArrayCollection;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\serializeTrait;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

    /**
     * @ORM\Table(name="customer_circle")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @package Mjr\Library\EntitiesBundle\Entity\Customer
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Circle
    {
        use serializeTrait;
        use LogableTrait;
        use SystemUserTrait;
        use SystemGroupTrait;
        use IdTrait;
        /**
         * @ORM\Column(name="name", type="string", length=80, nullable=false)
         * @Gedmo\Versioned
         * @var string
         */
        protected $Name;
        /**
         * @ORM\Column(name="description", type="text", nullable=true)
         * @Gedmo\Versioned
         * @var string
         */
        protected $Description;
        /**
         * @ORM\ManyToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Customer\Main", fetch="EXTRA_LAZY")
         * @ORM\JoinTable(name="customer_circle_map",
         *      joinColumns={@ORM\JoinColumn(name="circle_id", referencedColumnName="id")},
         *      inverseJoinColumns={@ORM\JoinColumn(name="customer_id", referencedColumnName="id", unique=true)}
         * )
         * @var ArrayCollection
         */
        protected $Customers;
        /**
         * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"=false})
         * @var boolean
         */
        protected $Active;

        /**
         * Circle constructor.
         */
        public function __construct()
        {
            $this->Clients = new ArrayCollection();
        }

        /**
         * @return ArrayCollection
         */
        public function getCustomers()
        {
            return $this->Customers;
        }

        /**
         * @param Main $main
         * @return bool
         */
        public function hasCustomer(Main $main)
        {
            return $this->Customers->contains($main);
        }

        /**
         * @param Main $main
         * @return $this
         */
        public function addCustomer(Main $main)
        {
            if(!$this->hasCustomer($main))
            {
                $this->Customers->add($main);
            }
            return $this;
        }

        /**
         * @param Main $main
         * @return bool
         */
        public function removeCustomer(Main $main)
        {
            if($this->hasCustomer($main))
            {
                $this->Customers->removeElement($main);
                return true;
            }
            return false;
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

        /**
         * @return string
         */
        public function getDescription()
        {
            return $this->Description;
        }

        /**
         * @param string $Description
         * @return $this
         */
        public function setDescription($Description)
        {
            $this->Description = $Description;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isActive()
        {
            return $this->Active;
        }

        /**
         * @param boolean $Active
         * @return $this
         */
        public function setActive($Active)
        {
            $this->Active = $Active;
            return $this;
        }
    }