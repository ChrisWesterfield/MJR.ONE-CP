<?php

namespace Mjr\Library\EntitiesBundle\Entity\Host\Server;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;

/**
 * @ORM\Table(name="host_config_dns")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\System\Server
 * @author Chris Westerfield <chris@mjr.one>
 */
class Dns
{
    use serializeTrait;
    use LogableTrait;
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     */
    protected $Id;
    /**
     * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY", inversedBy="ConfigDns")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @var Main
     */
    protected $Server;
    /**
     * @ORM\Column(name="daemon", type="string", length=128, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $Daemon;
    /**
     * @ORM\Column(name="bind_user", type="string", length=128, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $BindUser;
    /**
     * @ORM\Column(name="bind_group", type="string", length=128, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $BindGroup;
    /**
     * @ORM\Column(name="bind_zone_files_directory", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $BindZoneFilesDirectory;
    /**
     * @ORM\Column(name="bind_named_config_filename", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $BindNamedConfigFilename;
    /**
     * @ORM\Column(name="bind_named_local_file_name", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $BindNamedLocalFileName;
    /**
     * @ORM\Column(name="disable_bind9messages_for_log_level_warning", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $DisableBind9MessagesForLogLevelWarning;
    /**
     * @Todo PowerDNS
     */

    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     * @return $this
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return Main
     */
    public function getServer()
    {
        return $this->Server;
    }

    /**
     * @param Main $Server
     * @return $this
     */
    public function setServer($Server)
    {
        $this->Server = $Server;
        return $this;
    }

    /**
     * @return string
     */
    public function getDaemon()
    {
        return $this->Daemon;
    }

    /**
     * @param string $Daemon
     * @return $this
     */
    public function setDaemon($Daemon)
    {
        $this->Daemon = $Daemon;
        return $this;
    }

    /**
     * @return string
     */
    public function getBindUser()
    {
        return $this->BindUser;
    }

    /**
     * @param string $BindUser
     * @return $this
     */
    public function setBindUser($BindUser)
    {
        $this->BindUser = $BindUser;
        return $this;
    }

    /**
     * @return string
     */
    public function getBindGroup()
    {
        return $this->BindGroup;
    }

    /**
     * @param string $BindGroup
     * @return $this
     */
    public function setBindGroup($BindGroup)
    {
        $this->BindGroup = $BindGroup;
        return $this;
    }

    /**
     * @return string
     */
    public function getBindZoneFilesDirectory()
    {
        return $this->BindZoneFilesDirectory;
    }

    /**
     * @param string $BindZoneFilesDirectory
     * @return $this
     */
    public function setBindZoneFilesDirectory($BindZoneFilesDirectory)
    {
        $this->BindZoneFilesDirectory = $BindZoneFilesDirectory;
        return $this;
    }

    /**
     * @return string
     */
    public function getBindNamedConfigFilename()
    {
        return $this->BindNamedConfigFilename;
    }

    /**
     * @param string $BindNamedConfigFilename
     * @return $this
     */
    public function setBindNamedConfigFilename($BindNamedConfigFilename)
    {
        $this->BindNamedConfigFilename = $BindNamedConfigFilename;
        return $this;
    }

    /**
     * @return string
     */
    public function getBindNamedLocalFileName()
    {
        return $this->BindNamedLocalFileName;
    }

    /**
     * @param string $BindNamedLocalFileName
     * @return $this
     */
    public function setBindNamedLocalFileName($BindNamedLocalFileName)
    {
        $this->BindNamedLocalFileName = $BindNamedLocalFileName;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableBind9MessagesForLogLevelWarning()
    {
        return $this->DisableBind9MessagesForLogLevelWarning;
    }

    /**
     * @param boolean $DisableBind9MessagesForLogLevelWarning
     * @return $this
     */
    public function setDisableBind9MessagesForLogLevelWarning($DisableBind9MessagesForLogLevelWarning)
    {
        $this->DisableBind9MessagesForLogLevelWarning = $DisableBind9MessagesForLogLevelWarning;
        return $this;
    }
}