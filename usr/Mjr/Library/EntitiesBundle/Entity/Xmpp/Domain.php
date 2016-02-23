<?php

namespace Mjr\Library\EntitiesBundle\Entity\Xmpp;

use Mjr\Library\EntitiesBundle\Entity\Web\Certificate;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Domain as SystemDomain;

/**
 * @ORM\Table(name="xmpp_domain")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Xmpp
 * @author Chris Westerfield <chris@mjr.one>
 */
class Domain
{
    use IdTrait;
    use SystemUserTrait;
    use SystemGroupTrait;
    use ServerTrait;
    use ActiveTrait;
    use LogableTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Domain", inversedBy="XmppDomain", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id", nullable=true)
     * @var SystemDomain
     */
    protected $SystemDomain;
    /**
     * @ORM\Column(name="domain", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Domain;
    /**
     * @ORM\Column(name="management_mehtod", type="string", length=255, nullable=false, options={"default"="normal"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $ManagementMehtod;
    /**
     * @ORM\Column(name="public_registration", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $PublicRegistration;
    /**
     * @ORM\Column(name="registration_url", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $RegistrationUrl;
    /**
     * @ORM\Column(name="registration_message", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $RegistrationMessage;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Xmpp\User", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_user_id", referencedColumnName="id")
     */
    protected $DomainAdmins;
    /**
     * @ORM\Column(name="use_pub_sub", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $UsePubSub;
    /**
     * @ORM\Column(name="use_proxy", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $UseProxy;
    /**
     * @ORM\Column(name="use_anonymous_host", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $UseAnonymousHost;
    /**
     * @ORM\Column(name="use_vjud", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $UseVJud;
    /**
     * @ORM\Column(name="vjud_opt_mode", type="string", length=8, nullable=false, options={"default"="in"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $VJudOptMode;
    /**
     * @ORM\Column(name="use_muc_host", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $UseMucHost;
    /**
     * @ORM\Column(name="muc_name", type="string", length=32, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $MucName;
    /**
     * @ORM\Column(name="muc_restrict_room_creation", type="string", length=1, nullable=false, options={"defaul"="m"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $MucRestrictRoomCreation;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Xmpp\User", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="muc_domain_id", referencedColumnName="id")
     */
    protected $MucAdmins;
    /**
     * @ORM\Column(name="use_pastebin", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $UsePastebin;
    /**
     * @ORM\Column(name="paste_bin_expire_after", type="integer", precision=3, nullable=false, options={"default"=48})
     * @var string
     * @Gedmo\Versioned
     */
    protected $PasteBinExpireAfter;
    /**
     * @ORM\Column(name="pastebin_trigger", type="string", length=10, nullable=false, options={"default"="!paste"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $PastebinTrigger;
    /**
     * @ORM\Column(name="use_http_archive", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $UseHttpArchive;
    /**
     * @ORM\Column(name="use_http_archive_show_status", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $UseHttpArchiveShowStatus;
    /**
     * @ORM\Column(name="use_status_host", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $UseStatusHost;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\Certificate", inversedBy="XmppDomains", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="ssl_certificate_id", referencedColumnName="id", nullable=true)
     * @var Certificate
     */
    protected $Certificate;

    /**
     * @return SystemDomain
     */
    public function getSystemDomain()
    {
        return $this->SystemDomain;
    }

    /**
     * @param SystemDomain $SystemDomain
     * @return $this
     */
    public function setSystemDomain($SystemDomain)
    {
        $this->SystemDomain = $SystemDomain;
        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * @param string $Domain
     * @return $this
     */
    public function setDomain($Domain)
    {
        $this->Domain = $Domain;
        return $this;
    }

    /**
     * @return string
     */
    public function getManagementMehtod()
    {
        return $this->ManagementMehtod;
    }

    /**
     * @param string $ManagementMehtod
     * @return $this
     */
    public function setManagementMehtod($ManagementMehtod)
    {
        $this->ManagementMehtod = $ManagementMehtod;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPublicRegistration()
    {
        return $this->PublicRegistration;
    }

    /**
     * @param boolean $PublicRegistration
     * @return $this
     */
    public function setPublicRegistration($PublicRegistration)
    {
        $this->PublicRegistration = $PublicRegistration;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegistrationUrl()
    {
        return $this->RegistrationUrl;
    }

    /**
     * @param string $RegistrationUrl
     * @return $this
     */
    public function setRegistrationUrl($RegistrationUrl)
    {
        $this->RegistrationUrl = $RegistrationUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegistrationMessage()
    {
        return $this->RegistrationMessage;
    }

    /**
     * @param string $RegistrationMessage
     * @return $this
     */
    public function setRegistrationMessage($RegistrationMessage)
    {
        $this->RegistrationMessage = $RegistrationMessage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDomainAdmins()
    {
        return $this->DomainAdmins;
    }

    /**
     * @param mixed $DomainAdmins
     * @return $this
     */
    public function setDomainAdmins($DomainAdmins)
    {
        $this->DomainAdmins = $DomainAdmins;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUsePubSub()
    {
        return $this->UsePubSub;
    }

    /**
     * @param boolean $UsePubSub
     * @return $this
     */
    public function setUsePubSub($UsePubSub)
    {
        $this->UsePubSub = $UsePubSub;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUseProxy()
    {
        return $this->UseProxy;
    }

    /**
     * @param boolean $UseProxy
     * @return $this
     */
    public function setUseProxy($UseProxy)
    {
        $this->UseProxy = $UseProxy;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUseAnonymousHost()
    {
        return $this->UseAnonymousHost;
    }

    /**
     * @param boolean $UseAnonymousHost
     * @return $this
     */
    public function setUseAnonymousHost($UseAnonymousHost)
    {
        $this->UseAnonymousHost = $UseAnonymousHost;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUseVJud()
    {
        return $this->UseVJud;
    }

    /**
     * @param boolean $UseVJud
     * @return $this
     */
    public function setUseVJud($UseVJud)
    {
        $this->UseVJud = $UseVJud;
        return $this;
    }

    /**
     * @return string
     */
    public function getVJudOptMode()
    {
        return $this->VJudOptMode;
    }

    /**
     * @param string $VJudOptMode
     * @return $this
     */
    public function setVJudOptMode($VJudOptMode)
    {
        $this->VJudOptMode = $VJudOptMode;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUseMucHost()
    {
        return $this->UseMucHost;
    }

    /**
     * @param boolean $UseMucHost
     * @return $this
     */
    public function setUseMucHost($UseMucHost)
    {
        $this->UseMucHost = $UseMucHost;
        return $this;
    }

    /**
     * @return string
     */
    public function getMucName()
    {
        return $this->MucName;
    }

    /**
     * @param string $MucName
     * @return $this
     */
    public function setMucName($MucName)
    {
        $this->MucName = $MucName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMucRestrictRoomCreation()
    {
        return $this->MucRestrictRoomCreation;
    }

    /**
     * @param string $MucRestrictRoomCreation
     * @return $this
     */
    public function setMucRestrictRoomCreation($MucRestrictRoomCreation)
    {
        $this->MucRestrictRoomCreation = $MucRestrictRoomCreation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMucAdmins()
    {
        return $this->MucAdmins;
    }

    /**
     * @param mixed $MucAdmins
     * @return $this
     */
    public function setMucAdmins($MucAdmins)
    {
        $this->MucAdmins = $MucAdmins;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUsePastebin()
    {
        return $this->UsePastebin;
    }

    /**
     * @param boolean $UsePastebin
     * @return $this
     */
    public function setUsePastebin($UsePastebin)
    {
        $this->UsePastebin = $UsePastebin;
        return $this;
    }

    /**
     * @return string
     */
    public function getPasteBinExpireAfter()
    {
        return $this->PasteBinExpireAfter;
    }

    /**
     * @param string $PasteBinExpireAfter
     * @return $this
     */
    public function setPasteBinExpireAfter($PasteBinExpireAfter)
    {
        $this->PasteBinExpireAfter = $PasteBinExpireAfter;
        return $this;
    }

    /**
     * @return string
     */
    public function getPastebinTrigger()
    {
        return $this->PastebinTrigger;
    }

    /**
     * @param string $PastebinTrigger
     * @return $this
     */
    public function setPastebinTrigger($PastebinTrigger)
    {
        $this->PastebinTrigger = $PastebinTrigger;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUseHttpArchive()
    {
        return $this->UseHttpArchive;
    }

    /**
     * @param boolean $UseHttpArchive
     * @return $this
     */
    public function setUseHttpArchive($UseHttpArchive)
    {
        $this->UseHttpArchive = $UseHttpArchive;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUseHttpArchiveShowStatus()
    {
        return $this->UseHttpArchiveShowStatus;
    }

    /**
     * @param boolean $UseHttpArchiveShowStatus
     * @return $this
     */
    public function setUseHttpArchiveShowStatus($UseHttpArchiveShowStatus)
    {
        $this->UseHttpArchiveShowStatus = $UseHttpArchiveShowStatus;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isUseStatusHost()
    {
        return $this->UseStatusHost;
    }

    /**
     * @param boolean $UseStatusHost
     * @return $this
     */
    public function setUseStatusHost($UseStatusHost)
    {
        $this->UseStatusHost = $UseStatusHost;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCertificate()
    {
        return $this->Certificate;
    }

    /**
     * @param mixed $Certificate
     * @return $this
     */
    public function setCertificate($Certificate)
    {
        $this->Certificate = $Certificate;
        return $this;
    }


}