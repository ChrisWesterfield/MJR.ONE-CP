<?php

    namespace Mjr\Library\EntitiesBundle\Entities\User;
    use DateTime;
    use Doctrine\Common\Collections\ArrayCollection;
    use Mjr\Library\EntitiesBundle\Traits\serializeTrait;
    use Mjr\Library\EntitiesBundle\Traits\SoftDeletable;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
    use Symfony\Component\Security\Core\User\AdvancedUserInterface;
    use Symfony\Component\Security\Core\User\EquatableInterface;
    use Symfony\Component\Security\Core\User\UserInterface;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;

    /**
     * @ORM\Table(name="system_user")
     * @ORM\Entity(repositoryClass="Mjr\Library\EntitiesBundle\Repository\User\User")
     * @Gedmo\Loggable
     * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
     * @package OmegaDev\LibraryBundle\Entity
     * @author Chris Westerfield <westerfield.chris@gmail.com>
     */
    class User implements
        AdvancedUserInterface,
        EquatableInterface
    {
        use serializeTrait;
        use SoftDeletable;
        /**
         * @ORM\Id
         * @ORM\Column(type="integer", nullable=false)
         * @ORM\GeneratedValue(strategy="IDENTITY")
         */
        protected $id;

        /**
         * @var string
         */
        protected $username;

        /**
         * @ORM\Column(type="string", length=255, unique=true)
         * @Gedmo\Versioned
         */
        protected $email;

        /**
         * @ORM\Column(type="string", length=128)
         */
        protected $password;

        /**
         * @ORM\Column(type="string", length=64, nullable=true)
         * @Gedmo\Versioned
         */
        protected $firstname;

        /**
         * @ORM\Column(type="string", length=64, nullable=true)
         * @Gedmo\Versioned
         */
        protected $lastname;

        /**
         * @ORM\Column(name="active", type="boolean", options={"default": false})
         * @Gedmo\Versioned
         */
        protected $Active;

        /**
         * @ORM\Column(type="string", length=100, options={"default" = "ROLE_GUEST"})
         * @Gedmo\Versioned
         */
        protected $Role = 'ROLE_GUEST';

        /**
         * @ORM\Column(name="credentials_expire_date", type="datetime", nullable=true)
         * @var DateTime
         */
        protected $CredentialsExpireDate;

        /**
         * @ORM\Column(name="account_expire_date", type="datetime", nullable=true)
         * @var DateTime
         */
        protected $AccountExpireDate;

        /**
         * @ORM\Column(name="last_login",type="datetime",nullable=true)
         * @var DateTime
         */
        protected $LastLogin;

        /**
         * @var UserPasswordEncoder
         */
        protected $Encoder;

        /**
         * Constructor
         */
        public function __construct()
        {
            $this->Active = false;
            $this->username = time().'-UID-'.microtime();
            $this->Company = new ArrayCollection();
            $this->Values = new ArrayCollection();
            $this->AclRoles = new ArrayCollection();
            $this->u2fKeys = new ArrayCollection();
            $this->AclRoles = new ArrayCollection();
        }

        public function setEncoder(UserPasswordEncoder $enc)
        {
            $this->Encoder = $enc;
        }

        /**
         * @return DateTime
         */
        public function getCredentialsExpireDate()
        {
            return $this->CredentialsExpireDate;
        }

        /**
         * @param DateTime $CredentialsExpireDate
         *
         * @return $this
         */
        public function setCredentialsExpireDate($CredentialsExpireDate)
        {
            $this->CredentialsExpireDate = $CredentialsExpireDate;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getActive()
        {
            return $this->Active;
        }

        /**
         * @return null
         */
        public function getSalt()
        {
            // you *may* need a real salt depending on your encoder
            // see section on salt below
            return null;
        }

        /**
         * set and Encode Password.
         * The Password Encoder must be initialized!
         *
         * @param mixed $password
         *
         * @return $this
         * @throws \Excpetion
         */
        public function setPassword($password)
        {
            if($this->Encoder === null)
            {
                throw new \Excpetion('Password encoder not set!');
            }
            if($password!==null)
            {
                $this->password = $this->Encoder->encodePassword($this,$password);
            }
            return $this;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @return array
         */
        public function getRoles()
        {
            return array( $this->Role );
        }

        /**
         * Erase Credentials
         */
        public function eraseCredentials()
        {
        }

        /**
         * @return mixed
         */
        public function getFirstname()
        {
            return $this->firstname;
        }

        /**
         * @param mixed $firstname
         * @return $this
         */
        public function setFirstname($firstname)
        {
            $this->firstname = $firstname;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getLastname()
        {
            return $this->lastname;
        }

        /**
         * @param mixed $lastname
         * @return $this
         */
        public function setLastname($lastname)
        {
            $this->lastname = $lastname;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         * @return $this
         */
        public function setEmail($email)
        {
            $this->email = $email;
            return $this;
        }

        /**
         * returns the Username
         * @return mixed
         */
        public function getUsername()
        {
            return $this->getEmail();
        }

        /**
         * @return mixed
         */
        public function isEnabled()
        {
            return $this->isActive();
        }

        /**
         * @return mixed
         */
        public function IsActive()
        {
            return $this->Active;
        }

        /**
         * @param mixed $isActive
         * @return $this
         */
        public function setActive($isActive)
        {
            $this->Active = $isActive;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return string
         */
        public function getFullName()
        {
            return $this->getFirstname().' '.$this->getLastname();
        }

        /**
         * Checks whether the user's account has expired.
         *
         * Internally, if this method returns false, the authentication system
         * will throw an AccountExpiredException and prevent login.
         *
         * @return bool true if the user's account is non expired, false otherwise
         * @see AccountExpiredException
         */
        public function isAccountNonExpired()
        {
            if($this->AccountExpireDate===null)
            {
                return true;
            }
            else
                if((new DateTime())->getTimestamp() < $this->AccountExpireDate->getTimestamp())
                {
                    return true;
                }
            return false;
        }

        /**
         * Checks whether the user is locked.
         *
         * Internally, if this method returns false, the authentication system
         * will throw a LockedException and prevent login.
         *
         * @return bool true if the user is not locked, false otherwise
         * @see LockedException
         */
        public function isAccountNonLocked()
        {
            return $this->Active;
        }

        /**
         * Checks whether the user's credentials (password) has expired.
         *
         * Internally, if this method returns false, the authentication system
         * will throw a CredentialsExpiredException and prevent login.
         *
         * @return bool true if the user's credentials are non expired, false otherwise
         * @see CredentialsExpiredException
         */
        public function isCredentialsNonExpired()
        {
            if($this->CredentialsExpireDate===null)
            {
                return true;
            }
            else
                if((new DateTime())->getTimestamp() < $this->CredentialsExpireDate->getTimestamp())
                {
                    return true;
                }
            return false;
        }

        /**
         * @return DateTime
         */
        public function getAccountExpireDate()
        {
            return $this->AccountExpireDate;
        }

        /**
         * @param DateTime $AccountExpireDate
         *
         * @return $this
         */
        public function setAccountExpireDate($AccountExpireDate)
        {
            $this->AccountExpireDate = $AccountExpireDate;
            return $this;
        }

        /**
         * Sets the Date of Last Login
         */
        public function setLastLogin()
        {
            $this->LastLogin = new DateTime();
        }

        /**
         * @return DateTime
         */
        public function getLastLogin()
        {
            return $this->LastLogin;
        }

        /**
         * @return mixed
         */
        public function getRole()
        {
            return $this->Role;
        }

        /**
         * @param mixed $Role
         * @return $this
         */
        public function setRole($Role)
        {
            $this->Role = $Role;
            return $this;
        }

        /**
         * The equality comparison should neither be done by referential equality
         * nor by comparing identities (i.e. getId() === getId()).
         *
         * However, you do not need to compare every attribute, but only those that
         * are relevant for assessing whether re-authentication is required.
         *
         * Also implementation should consider that $user instance may implement
         * the extended user interface `AdvancedUserInterface`.
         *
         * @param UserInterface $user
         *
         * @return bool
         */
        public function isEqualTo(UserInterface $user)
        {
            return $this->username === $user->getUsername();
        }

        /**
         * @return boolean
         */
        public function isStatus()
        {
            return $this->isActive();
        }

        /**
         * @param $status
         *
         * @return $this
         */
        public function setStatus($status)
        {
            $this->Active = $status;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getIsActive()
        {
            return $this->Active;
        }

        /**
         * @param mixed $isActive
         *
         * @return $this
         */
        public function setIsActive($isActive)
        {
            $this->Active = $isActive;
            return $this;
        }
    }