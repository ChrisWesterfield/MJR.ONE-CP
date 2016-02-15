<?php


namespace Mjr\Library\EntitiesBundle\Entity\Mail;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;

/**
 * @ORM\Table(name="mail_backup")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class Backup
{
    use IdTrait;
    use ServerTrait;
    use LogableTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Domain", inversedBy="MailBackups", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
     * @var Domain
     */
    protected $Domain;
    /**
     * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\User", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="mail_user_id", referencedColumnName="id")
     * @var User
     */
    protected $MailUser;
    /**
     * @ORM\Column(name="backup_mode", type="string", length=64, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $BackupMode;
    /**
     * @ORM\Column(name="file_name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $FileName;
    /**
     * @ORM\Column(name="file_size", type="string", length=266, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $FileSize;

    /**
     * @return Domain
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * @param Domain $Domain
     * @return $this
     */
    public function setDomain($Domain)
    {
        $this->Domain = $Domain;
        return $this;
    }

    /**
     * @return User
     */
    public function getMailUser()
    {
        return $this->MailUser;
    }

    /**
     * @param User $MailUser
     * @return $this
     */
    public function setMailUser($MailUser)
    {
        $this->MailUser = $MailUser;
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
     * @return mixed
     */
    public function getFileName()
    {
        return $this->FileName;
    }

    /**
     * @param mixed $FileName
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