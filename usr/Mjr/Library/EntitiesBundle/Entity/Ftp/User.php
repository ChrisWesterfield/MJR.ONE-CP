<?php

namespace Mjr\Library\EntitiesBundle\Entity\Ftp;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\CustomerTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="ftp_user")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Ftp
 * @author Chris Westerfield <chris@mjr.one>
 */
class User
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ServerTrait;
    use ActiveTrait;
    use LogableTrait;
    use CustomerTrait;
    /**
     * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Domain", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
     */
    protected $Domain;
    /**
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Username;
    /**
     * @ORM\Column(name="user_prefix", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $UserPrefix;
    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @var string
     */
    protected $Password;
    /**
     * @ORM\Column(name="quota_size", type="bigint", nullable=false, options={"default"="-1"})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $QuotaSize;
    /**
     * @ORM\Column(name="user_id", type="string", length=64, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $UserId;
    /**
     * @ORM\Column(name="group_id", type="string", length=64, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $GroupId;
    /**
     * @ORM\Column(name="directory", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Directory;
    /**
     * @ORM\Column(name="quota_files", type="bigint", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $QuotaFiles;
    /**
     * @ORM\Column(name="upload_ratio", type="integer", nullable=false, options={"default"="-1"})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $UploadRatio;
    /**
     * @ORM\Column(name="download_ratio", type="integer", nullable=false, options={"default"="-1"})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $DownloadRatio;
    /**
     * @ORM\Column(name="upload_bandwith", type="integer", nullable=false, options={"default"="-1"})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $UploadBandwith;
    /**
     * @ORM\Column(name="download_bandwith", type="integer", nullable=false, options={"default"="-1"})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $DownloadBandwith;
    /**
     * @ORM\Column(name="expires", type="datetime", nullable=false)
     * @var DateTime
     * @Gedmo\Versioned
     */
    protected $Expires;

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

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * @param string $Username
     * @return $this
     */
    public function setUsername($Username)
    {
        $this->Username = $Username;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserPrefix()
    {
        return $this->UserPrefix;
    }

    /**
     * @param string $UserPrefix
     * @return $this
     */
    public function setUserPrefix($UserPrefix)
    {
        $this->UserPrefix = $UserPrefix;
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
     * @return int
     */
    public function getQuotaSize()
    {
        return $this->QuotaSize;
    }

    /**
     * @param int $QuotaSize
     * @return $this
     */
    public function setQuotaSize($QuotaSize)
    {
        $this->QuotaSize = $QuotaSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * @param string $UserId
     * @return $this
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->GroupId;
    }

    /**
     * @param string $GroupId
     * @return $this
     */
    public function setGroupId($GroupId)
    {
        $this->GroupId = $GroupId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDirectory()
    {
        return $this->Directory;
    }

    /**
     * @param string $Directory
     * @return $this
     */
    public function setDirectory($Directory)
    {
        $this->Directory = $Directory;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuotaFiles()
    {
        return $this->QuotaFiles;
    }

    /**
     * @param string $QuotaFiles
     * @return $this
     */
    public function setQuotaFiles($QuotaFiles)
    {
        $this->QuotaFiles = $QuotaFiles;
        return $this;
    }

    /**
     * @return int
     */
    public function getUploadRatio()
    {
        return $this->UploadRatio;
    }

    /**
     * @param int $UploadRatio
     * @return $this
     */
    public function setUploadRatio($UploadRatio)
    {
        $this->UploadRatio = $UploadRatio;
        return $this;
    }

    /**
     * @return int
     */
    public function getDownloadRatio()
    {
        return $this->DownloadRatio;
    }

    /**
     * @param int $DownloadRatio
     * @return $this
     */
    public function setDownloadRatio($DownloadRatio)
    {
        $this->DownloadRatio = $DownloadRatio;
        return $this;
    }

    /**
     * @return int
     */
    public function getUploadBandwith()
    {
        return $this->UploadBandwith;
    }

    /**
     * @param int $UploadBandwith
     * @return $this
     */
    public function setUploadBandwith($UploadBandwith)
    {
        $this->UploadBandwith = $UploadBandwith;
        return $this;
    }

    /**
     * @return int
     */
    public function getDownloadBandwith()
    {
        return $this->DownloadBandwith;
    }

    /**
     * @param int $DownloadBandwith
     * @return $this
     */
    public function setDownloadBandwith($DownloadBandwith)
    {
        $this->DownloadBandwith = $DownloadBandwith;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getExpires()
    {
        return $this->Expires;
    }

    /**
     * @param DateTime $Expires
     * @return $this
     */
    public function setExpires($Expires)
    {
        $this->Expires = $Expires;
        return $this;
    }
}