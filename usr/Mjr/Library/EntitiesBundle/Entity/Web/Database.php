<?php

namespace Mjr\Library\EntitiesBundle\Entity\Web;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="web_database")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Web
 * @author Chris Westerfield <chris@mjr.one>
 */
class Database
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ServerTrait;
    use ActiveTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="parent_domain_id", referencedColumnName="id")
     * @var WebDomain
     */
    protected $ParentDomain;
    /**
     * @ORM\Column(name="type", type="string", length=16, nullable=false, options={"default"="mysql"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;
    /**
     * @ORM\Column(name="name", type="string", length=64, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="prefix", type="string", length=64, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Prefix;
    /**
     * @ORM\Column(name="quota", type="bigint", precision=20, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Quota;
    /**
     * @ORM\Column(name="last_quota_notification", type="datetime", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $LastQuotaNotification;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\DatabaseUSer", inversedBy="Databases", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * @var DatabaseUSer
     */
    protected $Users;
    /**
     * @ORM\Column(name="character_set", type="string", length=64, nullable=false, options={"default"="utf8_bin"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $CharacterSet;
    /**
     * @ORM\Column(name="remote_access", type="boolean", nullable=false, options={"default"=false})
     * @var string
     * @Gedmo\Versioned
     */
    protected $RemoteAccess;
    /**
     * @ORM\Column(name="remote_ips", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $RemoteIps;
    /**
     * @ORM\Column(name="backup_interval", type="string", length=255, nullable=false, options={"default"="none"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $BackupInterval;
    /**
     * @ORM\Column(name="backup_copies", type="integer", nullable=true, options={"unsigned"=true, "default"=1})
     * @var string
     * @Gedmo\Versioned
     */
    protected $BackupCopies;

    /**
     * @return WebDomain
     */
    public function getParentDomain()
    {
        return $this->ParentDomain;
    }

    /**
     * @param WebDomain $ParentDomain
     * @return $this
     */
    public function setParentDomain(WebDomain $ParentDomain)
    {
        $this->ParentDomain = $ParentDomain;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     * @return $this
     */
    public function setType($Type)
    {
        $this->Type = $Type;
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
    public function getQuota()
    {
        return $this->Quota;
    }

    /**
     * @param string $Quota
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
    public function getLastQuotaNotification()
    {
        return $this->LastQuotaNotification;
    }

    /**
     * @param string $LastQuotaNotification
     * @return $this
     */
    public function setLastQuotaNotification($LastQuotaNotification)
    {
        $this->LastQuotaNotification = $LastQuotaNotification;
        return $this;
    }

    /**
     * @return DatabaseUSer
     */
    public function getUsers()
    {
        return $this->Users;
    }

    /**
     * @param DatabaseUSer $Users
     * @return $this
     */
    public function setUsers($Users)
    {
        $this->Users = $Users;
        return $this;
    }

    /**
     * @return string
     */
    public function getCharacterSet()
    {
        return $this->CharacterSet;
    }

    /**
     * @param string $CharacterSet
     * @return $this
     */
    public function setCharacterSet($CharacterSet)
    {
        $this->CharacterSet = $CharacterSet;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteAccess()
    {
        return $this->RemoteAccess;
    }

    /**
     * @param string $RemoteAccess
     * @return $this
     */
    public function setRemoteAccess($RemoteAccess)
    {
        $this->RemoteAccess = $RemoteAccess;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteIps()
    {
        return $this->RemoteIps;
    }

    /**
     * @param string $RemoteIps
     * @return $this
     */
    public function setRemoteIps($RemoteIps)
    {
        $this->RemoteIps = $RemoteIps;
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
}