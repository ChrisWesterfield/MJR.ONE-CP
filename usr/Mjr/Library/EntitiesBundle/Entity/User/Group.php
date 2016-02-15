<?php


    namespace Mjr\Library\EntitiesBundle\Entity\User;
    use DateTime;
    use Doctrine\Common\Collections\ArrayCollection;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\serializeTrait;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;

    /**
     * @ORM\Table(name="frontend_groups")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\User
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Group
    {
        use serializeTrait;
        use IdTrait;
        use LogableTrait;
        /**
         * @ORM\Column(type="string", length=255, unique=true, name="name")
         * @Gedmo\Versioned
         */
        protected $Name;
        /**
         * @ORM\Column(type="text", name="description")
         * @Gedmo\Versioned
         */
        protected $Description;

        /**
         * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Main", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=true)
         */
        protected $Customer;

        /**
         * @ORM\ManyToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\User\User", mappedBy="Groups", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $Users;

        /**
         * Group constructor.
         */
        public function __construct()
        {
            $this->Users = new ArrayCollection();
        }

        /**
         * @return ArrayCollection
         */
        public function getUsers()
        {
            return $this->Users;
        }

        /**
         * @param User $user
         * @return $this
         */
        public function addUser(User $user)
        {
            $this->Users->add($user);
            return $this;
        }

        /**
         * @param User $user
         * @return bool
         */
        public function hasUser(User $user)
        {
            return $this->Users->contains($user);
        }

        /**
         * @param User $user
         * @return bool
         */
        public function removeUser(User $user)
        {
            if($this->hasUser($user))
            {
                $this->Users->removeElement($user);
                return true;
            }
            return false;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->Name;
        }

        /**
         * @param mixed $Name
         * @return $this
         */
        public function setName($Name)
        {
            $this->Name = $Name;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->Description;
        }

        /**
         * @param mixed $Description
         * @return $this
         */
        public function setDescription($Description)
        {
            $this->Description = $Description;
            return $this;
        }

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
    }