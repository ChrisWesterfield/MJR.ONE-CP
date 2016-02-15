<?php

namespace Mjr\Library\EntitiesBundle\Entity\Spam;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="spamfilter_policy")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Spam
 * @author Chris Westerfield <chris@mjr.one>
 */
class Policy
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="virus_quarantine_to", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $VirusQuarantineTo;
    /**
     * @ORM\Column(name="spam_quarantine_to", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SpamQuarantineTo;
    /**
     * @ORM\Column(name="banned_quarantine_to", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $BannedQuarantineTo;
    /**
     * @ORM\Column(name="bad_header_quarantine_to", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $BadHeaderQuarantineTo;
    /**
     * @ORM\Column(name="other_quarantine_to", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $OtherQuarantineTo;
    /**
     * @ORM\Column(name="address_extension_virus", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $AddressExtensionVirus;
    /**
     * @ORM\Column(name="address_extension_spam", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $AddressExtensionSpam;
    /**
     * @ORM\Column(name="address_extension_banned", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $AddressExtensionBanned;
    /**
     * @ORM\Column(name="address_extension_bad_header", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $AddressExtensionBadHeader;
    /**
     * @ORM\Column(name="new_virus_admin", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NewVirusAdmin;
    /**
     * @ORM\Column(name="virus_admin", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $VirusAdmin;
    /**
     * @ORM\Column(name="banned_admin", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $BannedAdmin;
    /**
     * @ORM\Column(name="bad_header_admin", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $BadHeaderAdmin;
    /**
     * @ORM\Column(name="spam_admin", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SpamAdmin;
    /**
     * @ORM\Column(name="spam_subject_tag", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SpamSubjectTag;
    /**
     * @ORM\Column(name="spam_subject_tag2", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SpamSubjectTag2;
    /**
     * @ORM\Column(name="banned_rule_names", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $BannedRuleNames;

    /**
     * @ORM\Column(name="flag_virus_lover", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagVirusLover;
    /**
     * @ORM\Column(name="flag_spam_lover", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagSpamLover;
    /**
     * @ORM\Column(name="flag_banned_files_lover", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagBannedFilesLover;
    /**
     * @ORM\Column(name="bad_header_lover", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $BadHeaderLover;
    /**
     * @ORM\Column(name="by_pass_banned_checks", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $ByPassBannedChecks;
    /**
     * @ORM\Column(name="by_pass_header_checks", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $ByPassHeaderChecks;
    /**
     * @ORM\Column(name="spam_modifies_subject", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $SpamModifiesSubject;
    /**
     * @ORM\Column(name="warn_virus_recipient", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $WarnVirusRecipient;
    /**
     * @ORM\Column(name="warn_banned_recipient", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $WarnBannedRecipient;
    /**
     * @ORM\Column(name="warn_bead_header_recipient", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $WarnBeadHeaderRecipient;
    /**
     * @ORM\Column(name="p", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $PolicyDGreyList;

    /**
     * @ORM\Column(name="message_size_limit", type="integer", precision=11, nullable=false, options={"unsigned"=true})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $MessageSizeLimit;
    /**
     * @ORM\Column(name="policy_dquota_id", type="integer", precision=11, nullable=false, options={"default"=-1})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $PolicyDQuotaId;
    /**
     * @ORM\Column(name="policy_dquota_in_period", type="integer", precision=11, nullable=false, options={"default"=24})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $PolicyDQuotaInPeriod;
    /**
     * @ORM\Column(name="policy_dquota_out", type="integer", precision=11, nullable=false, options={"default"=-1})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $PolicyDQuotaOut;
    /**
     * @ORM\Column(name="policy_dquota_out_period", type="integer", precision=11, nullable=false, options={"default"=24})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $PolicyDQuotaOutPeriod;

    /**
     * @ORM\Column(name="spam_tag_level", type="float",  nullable=true)
     * @var float
     * @Gedmo\Versioned
     */
    protected $SpamTagLevel;
    /**
     * @ORM\Column(name="spam_tag2level", type="float",  nullable=true)
     * @var float
     * @Gedmo\Versioned
     */
    protected $SpamTag2Level;
    /**
     * @ORM\Column(name="spam_kill_level", type="float",  nullable=true)
     * @var float
     * @Gedmo\Versioned
     */
    protected $SpamKillLevel;
    /**
     * @ORM\Column(name="spam_dsn_cutoff_level", type="float",  nullable=true)
     * @var float
     * @Gedmo\Versioned
     */
    protected $SpamDsnCutoffLevel;
    /**
     * @ORM\Column(name="spam_quarantine_cut_off_level", type="float",  nullable=true)
     * @var float
     * @Gedmo\Versioned
     */
    protected $SpamQuarantineCutOffLevel;

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
    public function getVirusQuarantineTo()
    {
        return $this->VirusQuarantineTo;
    }

    /**
     * @param string $VirusQuarantineTo
     * @return $this
     */
    public function setVirusQuarantineTo($VirusQuarantineTo)
    {
        $this->VirusQuarantineTo = $VirusQuarantineTo;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpamQuarantineTo()
    {
        return $this->SpamQuarantineTo;
    }

    /**
     * @param string $SpamQuarantineTo
     * @return $this
     */
    public function setSpamQuarantineTo($SpamQuarantineTo)
    {
        $this->SpamQuarantineTo = $SpamQuarantineTo;
        return $this;
    }

    /**
     * @return string
     */
    public function getBannedQuarantineTo()
    {
        return $this->BannedQuarantineTo;
    }

    /**
     * @param string $BannedQuarantineTo
     * @return $this
     */
    public function setBannedQuarantineTo($BannedQuarantineTo)
    {
        $this->BannedQuarantineTo = $BannedQuarantineTo;
        return $this;
    }

    /**
     * @return string
     */
    public function getBadHeaderQuarantineTo()
    {
        return $this->BadHeaderQuarantineTo;
    }

    /**
     * @param string $BadHeaderQuarantineTo
     * @return $this
     */
    public function setBadHeaderQuarantineTo($BadHeaderQuarantineTo)
    {
        $this->BadHeaderQuarantineTo = $BadHeaderQuarantineTo;
        return $this;
    }

    /**
     * @return string
     */
    public function getOtherQuarantineTo()
    {
        return $this->OtherQuarantineTo;
    }

    /**
     * @param string $OtherQuarantineTo
     * @return $this
     */
    public function setOtherQuarantineTo($OtherQuarantineTo)
    {
        $this->OtherQuarantineTo = $OtherQuarantineTo;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressExtensionVirus()
    {
        return $this->AddressExtensionVirus;
    }

    /**
     * @param string $AddressExtensionVirus
     * @return $this
     */
    public function setAddressExtensionVirus($AddressExtensionVirus)
    {
        $this->AddressExtensionVirus = $AddressExtensionVirus;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressExtensionSpam()
    {
        return $this->AddressExtensionSpam;
    }

    /**
     * @param string $AddressExtensionSpam
     * @return $this
     */
    public function setAddressExtensionSpam($AddressExtensionSpam)
    {
        $this->AddressExtensionSpam = $AddressExtensionSpam;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressExtensionBanned()
    {
        return $this->AddressExtensionBanned;
    }

    /**
     * @param string $AddressExtensionBanned
     * @return $this
     */
    public function setAddressExtensionBanned($AddressExtensionBanned)
    {
        $this->AddressExtensionBanned = $AddressExtensionBanned;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressExtensionBadHeader()
    {
        return $this->AddressExtensionBadHeader;
    }

    /**
     * @param string $AddressExtensionBadHeader
     * @return $this
     */
    public function setAddressExtensionBadHeader($AddressExtensionBadHeader)
    {
        $this->AddressExtensionBadHeader = $AddressExtensionBadHeader;
        return $this;
    }

    /**
     * @return string
     */
    public function getNewVirusAdmin()
    {
        return $this->NewVirusAdmin;
    }

    /**
     * @param string $NewVirusAdmin
     * @return $this
     */
    public function setNewVirusAdmin($NewVirusAdmin)
    {
        $this->NewVirusAdmin = $NewVirusAdmin;
        return $this;
    }

    /**
     * @return string
     */
    public function getVirusAdmin()
    {
        return $this->VirusAdmin;
    }

    /**
     * @param string $VirusAdmin
     * @return $this
     */
    public function setVirusAdmin($VirusAdmin)
    {
        $this->VirusAdmin = $VirusAdmin;
        return $this;
    }

    /**
     * @return string
     */
    public function getBannedAdmin()
    {
        return $this->BannedAdmin;
    }

    /**
     * @param string $BannedAdmin
     * @return $this
     */
    public function setBannedAdmin($BannedAdmin)
    {
        $this->BannedAdmin = $BannedAdmin;
        return $this;
    }

    /**
     * @return string
     */
    public function getBadHeaderAdmin()
    {
        return $this->BadHeaderAdmin;
    }

    /**
     * @param string $BadHeaderAdmin
     * @return $this
     */
    public function setBadHeaderAdmin($BadHeaderAdmin)
    {
        $this->BadHeaderAdmin = $BadHeaderAdmin;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpamAdmin()
    {
        return $this->SpamAdmin;
    }

    /**
     * @param string $SpamAdmin
     * @return $this
     */
    public function setSpamAdmin($SpamAdmin)
    {
        $this->SpamAdmin = $SpamAdmin;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpamSubjectTag()
    {
        return $this->SpamSubjectTag;
    }

    /**
     * @param string $SpamSubjectTag
     * @return $this
     */
    public function setSpamSubjectTag($SpamSubjectTag)
    {
        $this->SpamSubjectTag = $SpamSubjectTag;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpamSubjectTag2()
    {
        return $this->SpamSubjectTag2;
    }

    /**
     * @param string $SpamSubjectTag2
     * @return $this
     */
    public function setSpamSubjectTag2($SpamSubjectTag2)
    {
        $this->SpamSubjectTag2 = $SpamSubjectTag2;
        return $this;
    }

    /**
     * @return string
     */
    public function getBannedRuleNames()
    {
        return $this->BannedRuleNames;
    }

    /**
     * @param string $BannedRuleNames
     * @return $this
     */
    public function setBannedRuleNames($BannedRuleNames)
    {
        $this->BannedRuleNames = $BannedRuleNames;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagVirusLover()
    {
        return $this->FlagVirusLover;
    }

    /**
     * @param boolean $FlagVirusLover
     * @return $this
     */
    public function setFlagVirusLover($FlagVirusLover)
    {
        $this->FlagVirusLover = $FlagVirusLover;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagSpamLover()
    {
        return $this->FlagSpamLover;
    }

    /**
     * @param boolean $FlagSpamLover
     * @return $this
     */
    public function setFlagSpamLover($FlagSpamLover)
    {
        $this->FlagSpamLover = $FlagSpamLover;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagBannedFilesLover()
    {
        return $this->FlagBannedFilesLover;
    }

    /**
     * @param boolean $FlagBannedFilesLover
     * @return $this
     */
    public function setFlagBannedFilesLover($FlagBannedFilesLover)
    {
        $this->FlagBannedFilesLover = $FlagBannedFilesLover;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isBadHeaderLover()
    {
        return $this->BadHeaderLover;
    }

    /**
     * @param boolean $BadHeaderLover
     * @return $this
     */
    public function setBadHeaderLover($BadHeaderLover)
    {
        $this->BadHeaderLover = $BadHeaderLover;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isByPassBannedChecks()
    {
        return $this->ByPassBannedChecks;
    }

    /**
     * @param boolean $ByPassBannedChecks
     * @return $this
     */
    public function setByPassBannedChecks($ByPassBannedChecks)
    {
        $this->ByPassBannedChecks = $ByPassBannedChecks;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isByPassHeaderChecks()
    {
        return $this->ByPassHeaderChecks;
    }

    /**
     * @param boolean $ByPassHeaderChecks
     * @return $this
     */
    public function setByPassHeaderChecks($ByPassHeaderChecks)
    {
        $this->ByPassHeaderChecks = $ByPassHeaderChecks;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSpamModifiesSubject()
    {
        return $this->SpamModifiesSubject;
    }

    /**
     * @param boolean $SpamModifiesSubject
     * @return $this
     */
    public function setSpamModifiesSubject($SpamModifiesSubject)
    {
        $this->SpamModifiesSubject = $SpamModifiesSubject;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWarnVirusRecipient()
    {
        return $this->WarnVirusRecipient;
    }

    /**
     * @param boolean $WarnVirusRecipient
     * @return $this
     */
    public function setWarnVirusRecipient($WarnVirusRecipient)
    {
        $this->WarnVirusRecipient = $WarnVirusRecipient;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWarnBannedRecipient()
    {
        return $this->WarnBannedRecipient;
    }

    /**
     * @param boolean $WarnBannedRecipient
     * @return $this
     */
    public function setWarnBannedRecipient($WarnBannedRecipient)
    {
        $this->WarnBannedRecipient = $WarnBannedRecipient;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWarnBeadHeaderRecipient()
    {
        return $this->WarnBeadHeaderRecipient;
    }

    /**
     * @param boolean $WarnBeadHeaderRecipient
     * @return $this
     */
    public function setWarnBeadHeaderRecipient($WarnBeadHeaderRecipient)
    {
        $this->WarnBeadHeaderRecipient = $WarnBeadHeaderRecipient;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPolicyDGreyList()
    {
        return $this->PolicyDGreyList;
    }

    /**
     * @param boolean $PolicyDGreyList
     * @return $this
     */
    public function setPolicyDGreyList($PolicyDGreyList)
    {
        $this->PolicyDGreyList = $PolicyDGreyList;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessageSizeLimit()
    {
        return $this->MessageSizeLimit;
    }

    /**
     * @param int $MessageSizeLimit
     * @return $this
     */
    public function setMessageSizeLimit($MessageSizeLimit)
    {
        $this->MessageSizeLimit = $MessageSizeLimit;
        return $this;
    }

    /**
     * @return int
     */
    public function getPolicyDQuotaId()
    {
        return $this->PolicyDQuotaId;
    }

    /**
     * @param int $PolicyDQuotaId
     * @return $this
     */
    public function setPolicyDQuotaId($PolicyDQuotaId)
    {
        $this->PolicyDQuotaId = $PolicyDQuotaId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPolicyDQuotaInPeriod()
    {
        return $this->PolicyDQuotaInPeriod;
    }

    /**
     * @param int $PolicyDQuotaInPeriod
     * @return $this
     */
    public function setPolicyDQuotaInPeriod($PolicyDQuotaInPeriod)
    {
        $this->PolicyDQuotaInPeriod = $PolicyDQuotaInPeriod;
        return $this;
    }

    /**
     * @return int
     */
    public function getPolicyDQuotaOut()
    {
        return $this->PolicyDQuotaOut;
    }

    /**
     * @param int $PolicyDQuotaOut
     * @return $this
     */
    public function setPolicyDQuotaOut($PolicyDQuotaOut)
    {
        $this->PolicyDQuotaOut = $PolicyDQuotaOut;
        return $this;
    }

    /**
     * @return int
     */
    public function getPolicyDQuotaOutPeriod()
    {
        return $this->PolicyDQuotaOutPeriod;
    }

    /**
     * @param int $PolicyDQuotaOutPeriod
     * @return $this
     */
    public function setPolicyDQuotaOutPeriod($PolicyDQuotaOutPeriod)
    {
        $this->PolicyDQuotaOutPeriod = $PolicyDQuotaOutPeriod;
        return $this;
    }

    /**
     * @return float
     */
    public function getSpamTagLevel()
    {
        return $this->SpamTagLevel;
    }

    /**
     * @param float $SpamTagLevel
     * @return $this
     */
    public function setSpamTagLevel($SpamTagLevel)
    {
        $this->SpamTagLevel = $SpamTagLevel;
        return $this;
    }

    /**
     * @return float
     */
    public function getSpamTag2Level()
    {
        return $this->SpamTag2Level;
    }

    /**
     * @param float $SpamTag2Level
     * @return $this
     */
    public function setSpamTag2Level($SpamTag2Level)
    {
        $this->SpamTag2Level = $SpamTag2Level;
        return $this;
    }

    /**
     * @return float
     */
    public function getSpamKillLevel()
    {
        return $this->SpamKillLevel;
    }

    /**
     * @param float $SpamKillLevel
     * @return $this
     */
    public function setSpamKillLevel($SpamKillLevel)
    {
        $this->SpamKillLevel = $SpamKillLevel;
        return $this;
    }

    /**
     * @return float
     */
    public function getSpamDsnCutoffLevel()
    {
        return $this->SpamDsnCutoffLevel;
    }

    /**
     * @param float $SpamDsnCutoffLevel
     * @return $this
     */
    public function setSpamDsnCutoffLevel($SpamDsnCutoffLevel)
    {
        $this->SpamDsnCutoffLevel = $SpamDsnCutoffLevel;
        return $this;
    }

    /**
     * @return float
     */
    public function getSpamQuarantineCutOffLevel()
    {
        return $this->SpamQuarantineCutOffLevel;
    }

    /**
     * @param float $SpamQuarantineCutOffLevel
     * @return $this
     */
    public function setSpamQuarantineCutOffLevel($SpamQuarantineCutOffLevel)
    {
        $this->SpamQuarantineCutOffLevel = $SpamQuarantineCutOffLevel;
        return $this;
    }
}