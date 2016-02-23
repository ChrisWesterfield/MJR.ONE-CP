<?php

namespace Mjr\Library\EntitiesBundle\Entity\Web;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;

/**
 * @ORM\Table(name="web_backup")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Web
 * @author Chris Westerfield <chris@mjr.one>
 */
class Backup
{
    use IdTrait;
    use ServerTrait;
    use ActiveTrait;
    use LogableTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="parent_domain_id", referencedColumnName="id")
     */
    protected $ParentDomain;
    /**
     * @ORM\Column(name="backup_type", type="string", length=32, nullable=false, options={"default"="web"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $BackupType;
    /**
     * @ORM\Column(name="backup_mode", type="string", length=64, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $BackupMode;
    /**
     * @ORM\Column(name="file_name", type="string", nullable=false, length=255)
     * @var string
     * @Gedmo\Versioned
     */
    protected $FileName;
    /**
     * @ORM\Column(name="file_size", type="bigint", precision=20, nullable=false, options={"default"=0})
     * @var string
     * @Gedmo\Versioned
     */
    protected $FileSize;

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
    public function getBackupType()
    {
        return $this->BackupType;
    }

    /**
     * @param string $BackupType
     * @return $this
     */
    public function setBackupType($BackupType)
    {
        $this->BackupType = $BackupType;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackupMode()
    {
        return $this->BackupMode;
    }

    /**
     * @param string $BackupMode
     * @return $this
     */
    public function setBackupMode($BackupMode)
    {
        $this->BackupMode = $BackupMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->FileName;
    }

    /**
     * @param string $FileName
     * @return $this
     */
    public function setFileName($FileName)
    {
        $this->FileName = $FileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileSize()
    {
        return $this->FileSize;
    }

    /**
     * @param string $FileSize
     * @return $this
     */
    public function setFileSize($FileSize)
    {
        $this->FileSize = $FileSize;
        return $this;
    }
}