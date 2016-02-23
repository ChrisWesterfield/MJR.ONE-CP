<?php


    namespace Mjr\Library\EntitiesBundle\Entity\Mail;
    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

    /**
     * @ORM\Table(name="mail_domain")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\Mail
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Domain
    {
        use LogableTrait;
        use IdTrait;
        use ActiveTrait;
        use SystemGroupTrait;
        use SystemUserTrait;
        use ServerTrait;
        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\User", mappedBy="Domain", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $MailUsers;
        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Backup", mappedBy="Domain", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $MailBackups;
        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Forward", mappedBy="Domain", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $MailForwards;
        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\GetMail", mappedBy="Domain", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $MailGets;
        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\MaillingList", mappedBy="Domain", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $MaillingLists;
        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Transport", mappedBy="Domain" , fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $MailTransports;
        /**
         * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Domain", inversedBy="MailDomain", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
         * @var \Mjr\Library\EntitiesBundle\Entity\Domain
         */
        protected $Domain;
        /**
         * @ORM\Column(name="dkim", type="boolean", nullable=false, options={"default"=false})
         * @var boolean
         * @Gedmo\Versioned
         */
        protected $Dkim;
        /**
         * @ORM\Column(name="dkim_selector", type="string", length=63, options={"default"="default"}, nullable=false)
         * @var string
         * @Gedmo\Versioned
         */
        protected $DkimSelector;
        /**
         * @ORM\Column(name="dkim_private", type="text", nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $DkimPrivate;
        /**
         * @ORM\Column(name="dkim_public", type="text", nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $DkimPublic;

        /**
         * Domain constructor.
         */
        public function __construct()
        {
            $this->Domain = new ArrayCollection();
            $this->MailBackups = new ArrayCollection();
            $this->MailForwards = new ArrayCollection();
            $this->MailGets = new ArrayCollection();
            $this->MaillingLists = new ArrayCollection();
            $this->MailTransports = new ArrayCollection();
        }

        /**
         * @return \Mjr\Library\EntitiesBundle\Entity\Domain
         */
        public function getDomain()
        {
            return $this->Domain;
        }

        /**
         * @param \Mjr\Library\EntitiesBundle\Entity\Domain $Domain
         * @return $this
         */
        public function setDomain($Domain)
        {
            $this->Domain = $Domain;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isDkim()
        {
            return $this->Dkim;
        }

        /**
         * @param boolean $Dkim
         * @return $this
         */
        public function setDkim($Dkim)
        {
            $this->Dkim = $Dkim;
            return $this;
        }

        /**
         * @return string
         */
        public function getDkimSelector()
        {
            return $this->DkimSelector;
        }

        /**
         * @param string $DkimSelector
         * @return $this
         */
        public function setDkimSelector($DkimSelector)
        {
            $this->DkimSelector = $DkimSelector;
            return $this;
        }

        /**
         * @return string
         */
        public function getDkimPrivate()
        {
            return $this->DkimPrivate;
        }

        /**
         * @param string $DkimPrivate
         * @return $this
         */
        public function setDkimPrivate($DkimPrivate)
        {
            $this->DkimPrivate = $DkimPrivate;
            return $this;
        }

        /**
         * @return string
         */
        public function getDkimPublic()
        {
            return $this->DkimPublic;
        }

        /**
         * @param string $DkimPublic
         * @return $this
         */
        public function setDkimPublic($DkimPublic)
        {
            $this->DkimPublic = $DkimPublic;
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getMailUsers()
        {
            return $this->MailUsers;
        }

        /**
         * @param User $user
         * @return bool
         */
        public function hasMailUser(User $user)
        {
            return $this->MailUsers->contains($user);
        }

        /**
         * @param User $user
         * @return $this
         */
        public function addMailUser(User $user)
        {
            if(!$this->hasMailUser($user))
            {
                $this->MailUsers->add($user);
            }
            return $this;
        }

        /**
         * @param User $user
         * @return $this
         */
        public function removeMailUser(User $user)
        {
            if($this->hasMailUser($user))
            {
                $this->MailUsers->removeElement($user);
            }
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getMailBackups()
        {
            return $this->MailBackups;
        }

        /**
         * @param Backup $backup
         * @return bool
         */
        public function hasMailBackup(Backup $backup)
        {
            return $this->MailBackups->contains($backup);
        }

        /**
         * @param Backup $backup
         * @return $this
         */
        public function addMailBackup(Backup $backup)
        {
            if(!$this->hasMailBackup($backup))
            {
                $this->MailBackups->add($backup);
            }
            return $this;
        }

        /**
         * @param Backup $backup
         * @return $this
         */
        public function removeMailBackup(Backup $backup)
        {
            if($this->hasMailBackup($backup))
            {
                $this->MailBackups->removeElement($backup);
            }
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getMailForwards()
        {
            return $this->MailForwards;
        }

        /**
         * @param Forward $Forward
         * @return bool
         */
        public function hasMailForward(Forward $Forward)
        {
            return $this->MailForwards->contains($Forward);
        }

        /**
         * @param Forward $Forward
         * @return $this
         */
        public function addMailForward(Forward $Forward)
        {
            if(!$this->hasMailForward($Forward))
            {
                $this->MailForwards->add($Forward);
            }
            return $this;
        }

        /**
         * @param Forward $Forward
         * @return $this
         */
        public function removeMailForward(Forward $Forward)
        {
            if($this->hasMailForward($Forward))
            {
                $this->MailForwards->removeElement($Forward);
            }
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getMailGet()
        {
            return $this->MailGets;
        }

        /**
         * @param GetMail $GetMail
         * @return bool
         */
        public function hasMailGet(GetMail $GetMail)
        {
            return $this->MailGets->contains($GetMail);
        }

        /**
         * @param GetMail $GetMail
         * @return $this
         */
        public function addMailGet(GetMail $GetMail)
        {
            if(!$this->hasMailGet($GetMail))
            {
                $this->MailGets->add($GetMail);
            }
            return $this;
        }

        /**
         * @param GetMail $GetMail
         * @return $this
         */
        public function removeMailGet(GetMail $GetMail)
        {
            if($this->hasMailGet($GetMail))
            {
                $this->MailGets->removeElement($GetMail);
            }
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getMaillingLists()
        {
            return $this->MaillingLists;
        }

        /**
         * @param MaillingList $MaillistList
         * @return bool
         */
        public function hasMaillingList(MaillingList $MaillistList)
        {
            return $this->MaillingLists->contains($MaillistList);
        }

        /**
         * @param MaillingList $MaillingList
         * @return $this
         */
        public function addMaillingList(MaillingList $MaillingList)
        {
            if(!$this->hasMaillingList($MaillingList))
            {
                $this->MaillingLists->add($MaillingList);
            }
            return $this;
        }

        /**
         * @param MaillingList $MaillingList
         * @return $this
         */
        public function removeMaillingList(MaillingList $MaillingList)
        {
            if($this->hasMaillingList($MaillingList))
            {
                $this->MaillingLists->removeElement($MaillingList);
            }
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getMailTransports()
        {
            return $this->MailTransports;
        }

        /**
         * @param Transport $MailTransport
         * @return bool
         */
        public function hasMailTransports(Transport $MailTransport)
        {
            return $this->MailTransports->contains($MailTransport);
        }

        /**
         * @param Transport $MailTransport
         * @return $this
         */
        public function addMailTransports(Transport $MailTransport)
        {
            if(!$this->hasMailTransports($MailTransport))
            {
                $this->MailTransports->add($MailTransport);
            }
            return $this;
        }

        /**
         * @param Transport $MailTransport
         * @return $this
         */
        public function removeMailTransports(Transport $MailTransport)
        {
            if($this->hasMailTransports($MailTransport))
            {
                $this->MailTransports->removeElement($MailTransport);
            }
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getMailGets()
        {
            return $this->getMailGet();
        }

    }