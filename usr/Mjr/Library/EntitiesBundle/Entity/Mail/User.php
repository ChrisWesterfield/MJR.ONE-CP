<?php


namespace Mjr\Library\EntitiesBundle\Entity\Mail;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="mail_users")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class User
{
    use IdTrait;
    use SystemUserTrait;
    use SystemGroupTrait;
    use ServerTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Domain", inversedBy="MailUsers", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
     * @var \Mjr\Library\EntitiesBundle\Entity\Domain
     */
    protected $Domain;
    /**
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Email;
    /**
     * @ORM\Column(name="login", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Login;
    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @var string
     */
    protected $Password;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="uid", type="integer", nullable=false, options={"default"=5000})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Uid;
    /**
     * @ORM\Column(name="gid", type="integer", nullable=false, options={"default"=5000})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Gid;
    /**
     * @ORM\Column(name="mail_dir", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $MailDir;
    /**
     * @ORM\Column(name="mail_dir_format", type="string", length=50, nullable=false, options={"default"="maildir"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $MailDirFormat;
    /**
     * @ORM\Column(name="quota", type="bigint", options={"default"=-1}, nullable=false)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Quota;
    /**
     * @ORM\Column(name="cc", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $CC;
    /**
     * @ORM\Column(name="sender_cc", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SenderCC;
    /**
     * @ORM\Column(name="home_dir", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $HomeDir;
    /**
     * @ORM\Column(name="auto_responder", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $AutoResponder;
    /**
     * @ORM\Column(name="auto_responder_start_date", type="datetime", nullable=true)
     * @var DateTime
     * @Gedmo\Versioned
     */
    protected $AutoResponderStartDate;
    /**
     * @ORM\Column(name="auto_responder_end_date", type="datetime", nullable=true)
     * @var DateTime
     * @Gedmo\Versioned
     */
    protected $AutoResponderEndDate;
    /**
     * @ORM\Column(name="auto_repsonder_text", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $AutoRepsonderText;
    /**
     * @ORM\Column(name="move_junk", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $MoveJunk;
    /**
     * @ORM\Column(name="custom_mail_filter", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $CustomMailFilter;
    /**
     * @ORM\Column(name="postfix", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Postfix;
    /**
     * @ORM\Column(name="grey_listing", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $GreyListing;
    /**
     * @ORM\Column(name="access", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Access;
    /**
     * @ORM\Column(name="disable_imap", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $DisableImap;
    /**
     * @ORM\Column(name="disable_pop3", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $DisablePop3;
    /**
     * @ORM\Column(name="disable_deliver", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $DisableDeliver;
    /**
     * @ORM\Column(name="disable_smtp", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $DisableSmtp;
    /**
     * @ORM\Column(name="disable_sieve", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $DisableSieve;
    /**
     * @ORM\Column(name="disable_filter", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $DisableFilter;
    /**
     * @ORM\Column(name="disable_lda", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $DisableLDA;
    /**
     * @ORM\Column(name="disable_lmtp", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $DisableLmtp;
    /**
     * @ORM\Column(name="disable_dove_adm", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $DisableDoveAdm;
    /**
     * @ORM\Column(name="last_quota_notification", type="date", nullable=true)
     * @var DateTime
     * @Gedmo\Versioned
     */
    protected $LastQuotaNotification;
    /**
     * @ORM\Column(name="backup_interval", type="string", length=255, nullable=false, options={"default"="none"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $BackupInterval;
    /**
     * @ORM\Column(name="backup_copies", type="integer", nullable=false, options={"default"=1})
     * @var string
     * @Gedmo\Versioned
     */
    protected $BackupCopies;

    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\FilterUser", mappedBy="MailUser")
     * @var ArrayCollection
     */
    protected $MailFilters;

    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Traffic", mappedBy="MailUser")
     * @var ArrayCollection
     */
    protected $Traffic;

    public function __construct()
    {
        $this->MailFilters = new ArrayCollection();
        $this->Traffic = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getMailFilters()
    {
        return $this->MailFilters;
    }

    /**
     * @param FilterUser $filter
     * @return bool
     */
    public function hasMailFilter(FilterUser $filter)
    {
        return $this->MailFilters->contains($filter);
    }

    /**
     * @param FilterUser $filter
     * @return $this
     */
    public function addMailFilter(FilterUser $filter)
    {
        if(!$this->hasMailFilter($filter))
        {
            $this->MailFilters->add($filter);
        }
        return $this;
    }

    /**
     * @param FilterUser $filter
     * @return $this
     */
    public function removeMailFilter(FilterUser $filter)
    {
        if($this->hasMailFilter($filter))
        {
            $this->MailFilters->removeElement($filter);
        }
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTraffic()
    {
        return $this->Traffic;
    }

    /**
     * @param Traffic $Traffic
     * @return bool
     */
    public function hasTraffic(Traffic $Traffic)
    {
        return $this->Traffic->contains($Traffic);
    }

    /**
     * @param Traffic $Traffic
     * @return $this
     */
    public function addTraffic(Traffic $Traffic)
    {
        if(!$this->hasTraffic($Traffic))
        {
            $this->Traffic->add($Traffic);
        }
        return $this;
    }

    /**
     * @param Traffic $Traffic
     * @return $this
     */
    public function removeTraffic(Traffic $Traffic)
    {
        if($this->hasTraffic($Traffic))
        {
            $this->Traffic->removeElement($Traffic);
        }
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
     * @return string
     */
    public function getLogin()
    {
        return $this->Login;
    }

    /**
     * @param string $Login
     * @return $this
     */
    public function setLogin($Login)
    {
        $this->Login = $Login;
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
     * @return int
     */
    public function getUid()
    {
        return $this->Uid;
    }

    /**
     * @param int $Uid
     * @return $this
     */
    public function setUid($Uid)
    {
        $this->Uid = $Uid;
        return $this;
    }

    /**
     * @return int
     */
    public function getGid()
    {
        return $this->Gid;
    }

    /**
     * @param int $Gid
     * @return $this
     */
    public function setGid($Gid)
    {
        $this->Gid = $Gid;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailDir()
    {
        return $this->MailDir;
    }

    /**
     * @param string $MailDir
     * @return $this
     */
    public function setMailDir($MailDir)
    {
        $this->MailDir = $MailDir;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailDirFormat()
    {
        return $this->MailDirFormat;
    }

    /**
     * @param string $MailDirFormat
     * @return $this
     */
    public function setMailDirFormat($MailDirFormat)
    {
        $this->MailDirFormat = $MailDirFormat;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuota()
    {
        return $this->Quota;
    }

    /**
     * @param int $Quota
     * @return $this
     */
    public function setQuota($Quota)
    {
        $this->Quota = $Quota;
        return $this;
    }

    /**
     * @return string
     */
    public function getCC()
    {
        return $this->CC;
    }

    /**
     * @param string $CC
     * @return $this
     */
    public function setCC($CC)
    {
        $this->CC = $CC;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderCC()
    {
        return $this->SenderCC;
    }

    /**
     * @param string $SenderCC
     * @return $this
     */
    public function setSenderCC($SenderCC)
    {
        $this->SenderCC = $SenderCC;
        return $this;
    }

    /**
     * @return string
     */
    public function getHomeDir()
    {
        return $this->HomeDir;
    }

    /**
     * @param string $HomeDir
     * @return $this
     */
    public function setHomeDir($HomeDir)
    {
        $this->HomeDir = $HomeDir;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAutoResponder()
    {
        return $this->AutoResponder;
    }

    /**
     * @param boolean $AutoResponder
     * @return $this
     */
    public function setAutoResponder($AutoResponder)
    {
        $this->AutoResponder = $AutoResponder;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getAutoResponderStartDate()
    {
        return $this->AutoResponderStartDate;
    }

    /**
     * @param DateTime $AutoResponderStartDate
     * @return $this
     */
    public function setAutoResponderStartDate($AutoResponderStartDate)
    {
        $this->AutoResponderStartDate = $AutoResponderStartDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getAutoResponderEndDate()
    {
        return $this->AutoResponderEndDate;
    }

    /**
     * @param DateTime $AutoResponderEndDate
     * @return $this
     */
    public function setAutoResponderEndDate($AutoResponderEndDate)
    {
        $this->AutoResponderEndDate = $AutoResponderEndDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutoRepsonderText()
    {
        return $this->AutoRepsonderText;
    }

    /**
     * @param string $AutoRepsonderText
     * @return $this
     */
    public function setAutoRepsonderText($AutoRepsonderText)
    {
        $this->AutoRepsonderText = $AutoRepsonderText;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMoveJunk()
    {
        return $this->MoveJunk;
    }

    /**
     * @param boolean $MoveJunk
     * @return $this
     */
    public function setMoveJunk($MoveJunk)
    {
        $this->MoveJunk = $MoveJunk;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCustomMailFilter()
    {
        return $this->CustomMailFilter;
    }

    /**
     * @param boolean $CustomMailFilter
     * @return $this
     */
    public function setCustomMailFilter($CustomMailFilter)
    {
        $this->CustomMailFilter = $CustomMailFilter;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPostfix()
    {
        return $this->Postfix;
    }

    /**
     * @param boolean $Postfix
     * @return $this
     */
    public function setPostfix($Postfix)
    {
        $this->Postfix = $Postfix;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isGreyListing()
    {
        return $this->GreyListing;
    }

    /**
     * @param boolean $GreyListing
     * @return $this
     */
    public function setGreyListing($GreyListing)
    {
        $this->GreyListing = $GreyListing;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAccess()
    {
        return $this->Access;
    }

    /**
     * @param boolean $Access
     * @return $this
     */
    public function setAccess($Access)
    {
        $this->Access = $Access;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableImap()
    {
        return $this->DisableImap;
    }

    /**
     * @param boolean $DisableImap
     * @return $this
     */
    public function setDisableImap($DisableImap)
    {
        $this->DisableImap = $DisableImap;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisablePop3()
    {
        return $this->DisablePop3;
    }

    /**
     * @param boolean $DisablePop3
     * @return $this
     */
    public function setDisablePop3($DisablePop3)
    {
        $this->DisablePop3 = $DisablePop3;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableDeliver()
    {
        return $this->DisableDeliver;
    }

    /**
     * @param boolean $DisableDeliver
     * @return $this
     */
    public function setDisableDeliver($DisableDeliver)
    {
        $this->DisableDeliver = $DisableDeliver;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableSmtp()
    {
        return $this->DisableSmtp;
    }

    /**
     * @param boolean $DisableSmtp
     * @return $this
     */
    public function setDisableSmtp($DisableSmtp)
    {
        $this->DisableSmtp = $DisableSmtp;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableSieve()
    {
        return $this->DisableSieve;
    }

    /**
     * @param boolean $DisableSieve
     * @return $this
     */
    public function setDisableSieve($DisableSieve)
    {
        $this->DisableSieve = $DisableSieve;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableFilter()
    {
        return $this->DisableFilter;
    }

    /**
     * @param boolean $DisableFilter
     * @return $this
     */
    public function setDisableFilter($DisableFilter)
    {
        $this->DisableFilter = $DisableFilter;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableLDA()
    {
        return $this->DisableLDA;
    }

    /**
     * @param boolean $DisableLDA
     * @return $this
     */
    public function setDisableLDA($DisableLDA)
    {
        $this->DisableLDA = $DisableLDA;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableLmtp()
    {
        return $this->DisableLmtp;
    }

    /**
     * @param boolean $DisableLmtp
     * @return $this
     */
    public function setDisableLmtp($DisableLmtp)
    {
        $this->DisableLmtp = $DisableLmtp;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableDoveAdm()
    {
        return $this->DisableDoveAdm;
    }

    /**
     * @param boolean $DisableDoveAdm
     * @return $this
     */
    public function setDisableDoveAdm($DisableDoveAdm)
    {
        $this->DisableDoveAdm = $DisableDoveAdm;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getLastQuotaNotification()
    {
        return $this->LastQuotaNotification;
    }

    /**
     * @param DateTime $LastQuotaNotification
     * @return $this
     */
    public function setLastQuotaNotification($LastQuotaNotification)
    {
        $this->LastQuotaNotification = $LastQuotaNotification;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackupInterval()
    {
        return $this->BackupInterval;
    }

    /**
     * @param string $BackupInterval
     * @return $this
     */
    public function setBackupInterval($BackupInterval)
    {
        $this->BackupInterval = $BackupInterval;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackupCopies()
    {
        return $this->BackupCopies;
    }

    /**
     * @param string $BackupCopies
     * @return $this
     */
    public function setBackupCopies($BackupCopies)
    {
        $this->BackupCopies = $BackupCopies;
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