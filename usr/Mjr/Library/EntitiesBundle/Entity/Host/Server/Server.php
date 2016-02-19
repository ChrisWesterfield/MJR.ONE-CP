<?php

    namespace Mjr\Library\EntitiesBundle\Entity\Host\Server;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Entity\Host\Main;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\serializeTrait;

    /**
     * @ORM\Table(name="host_config_server")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\System\Server
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Server
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
         * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY", inversedBy="ConfigServer")
         * @ORM\JoinColumn(name="id", referencedColumnName="id")
         * @var Main
         */
        protected $Server;
        /**
         * @ORM\Column(name="vlogger_config_directory", type="string", length=255, nullable=true)
         * @var string
         */
        protected $VloggerConfigDirectory;
        /**
         * @ORM\Column(name="network_config", type="boolean", nullable=false, options={"default"=false})
         * @Gedmo\Versioned()
         * @var bool
         */
        protected $NetworkConfig;
        /**
         * @ORM\Column(name="ip_address", type="string", length=128, nullable=false)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $IpAddress;
        /**
         * @ORM\Column(name="netmask", type="string", length=128, nullable=false)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $Netmask;
        /**
         * @ORM\Column(name="ip_v6prefix", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $IpV6Prefix;
        /**
         * @ORM\Column(name="gateway", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $Gateway;
        /**
         * @ORM\Column(name="hostname", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $Hostname;
        /**
         * @ORM\Column(name="name_servers", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $NameServers;
        /**
         * @ORM\Column(name="fire_wall", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $FireWall;
        /**
         * @ORM\Column(name="log_level", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $LogLevel;
        /**
         * @ORM\Column(name="warnings", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $Warnings;
        /**
         * @ORM\Column(name="backup_directory", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $BackupDirectory;
        /**
         * @ORM\Column(name="backup_directory_is_amount", type="boolean",nullable=false, options={"default"=false})
         * @Gedmo\Versioned()
         * @var bool
         */
        protected $BackupDirectoryIsAMount;
        /**
         * @ORM\Column(name="backup_mode", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $BackupMode;
        /**
         * @ORM\Column(name="backup_time", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $BackupTime;
        /**
         * @ORM\Column(name="delete_backup_on_site_delete", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $DeleteBackupOnSiteDelete;
        /**
         * @ORM\Column(name="check_for_linux_updates", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $CheckForLinuxUpdates;

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
        public function getVloggerConfigDirectory()
        {
            return $this->VloggerConfigDirectory;
        }

        /**
         * @param string $VloggerConfigDirectory
         * @return $this
         */
        public function setVloggerConfigDirectory($VloggerConfigDirectory)
        {
            $this->VloggerConfigDirectory = $VloggerConfigDirectory;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isNetworkConfig()
        {
            return $this->NetworkConfig;
        }

        /**
         * @param boolean $NetworkConfig
         * @return $this
         */
        public function setNetworkConfig($NetworkConfig)
        {
            $this->NetworkConfig = $NetworkConfig;
            return $this;
        }

        /**
         * @return string
         */
        public function getIpAddress()
        {
            return $this->IpAddress;
        }

        /**
         * @param string $IpAddress
         * @return $this
         */
        public function setIpAddress($IpAddress)
        {
            $this->IpAddress = $IpAddress;
            return $this;
        }

        /**
         * @return string
         */
        public function getNetmask()
        {
            return $this->Netmask;
        }

        /**
         * @param string $Netmask
         * @return $this
         */
        public function setNetmask($Netmask)
        {
            $this->Netmask = $Netmask;
            return $this;
        }

        /**
         * @return string
         */
        public function getIpV6Prefix()
        {
            return $this->IpV6Prefix;
        }

        /**
         * @param string $IpV6Prefix
         * @return $this
         */
        public function setIpV6Prefix($IpV6Prefix)
        {
            $this->IpV6Prefix = $IpV6Prefix;
            return $this;
        }

        /**
         * @return string
         */
        public function getGateway()
        {
            return $this->Gateway;
        }

        /**
         * @param string $Gateway
         * @return $this
         */
        public function setGateway($Gateway)
        {
            $this->Gateway = $Gateway;
            return $this;
        }

        /**
         * @return string
         */
        public function getHostname()
        {
            return $this->Hostname;
        }

        /**
         * @param string $Hostname
         * @return $this
         */
        public function setHostname($Hostname)
        {
            $this->Hostname = $Hostname;
            return $this;
        }

        /**
         * @return string
         */
        public function getNameServers()
        {
            return $this->NameServers;
        }

        /**
         * @param string $NameServers
         * @return $this
         */
        public function setNameServers($NameServers)
        {
            $this->NameServers = $NameServers;
            return $this;
        }

        /**
         * @return string
         */
        public function getFireWall()
        {
            return $this->FireWall;
        }

        /**
         * @param string $FireWall
         * @return $this
         */
        public function setFireWall($FireWall)
        {
            $this->FireWall = $FireWall;
            return $this;
        }

        /**
         * @return string
         */
        public function getLogLevel()
        {
            return $this->LogLevel;
        }

        /**
         * @param string $LogLevel
         * @return $this
         */
        public function setLogLevel($LogLevel)
        {
            $this->LogLevel = $LogLevel;
            return $this;
        }

        /**
         * @return string
         */
        public function getWarnings()
        {
            return $this->Warnings;
        }

        /**
         * @param string $Warnings
         * @return $this
         */
        public function setWarnings($Warnings)
        {
            $this->Warnings = $Warnings;
            return $this;
        }

        /**
         * @return string
         */
        public function getBackupDirectory()
        {
            return $this->BackupDirectory;
        }

        /**
         * @param string $BackupDirectory
         * @return $this
         */
        public function setBackupDirectory($BackupDirectory)
        {
            $this->BackupDirectory = $BackupDirectory;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isBackupDirectoryIsAMount()
        {
            return $this->BackupDirectoryIsAMount;
        }

        /**
         * @param boolean $BackupDirectoryIsAMount
         * @return $this
         */
        public function setBackupDirectoryIsAMount($BackupDirectoryIsAMount)
        {
            $this->BackupDirectoryIsAMount = $BackupDirectoryIsAMount;
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
        public function getBackupTime()
        {
            return $this->BackupTime;
        }

        /**
         * @param string $BackupTime
         * @return $this
         */
        public function setBackupTime($BackupTime)
        {
            $this->BackupTime = $BackupTime;
            return $this;
        }

        /**
         * @return string
         */
        public function getDeleteBackupOnSiteDelete()
        {
            return $this->DeleteBackupOnSiteDelete;
        }

        /**
         * @param string $DeleteBackupOnSiteDelete
         * @return $this
         */
        public function setDeleteBackupOnSiteDelete($DeleteBackupOnSiteDelete)
        {
            $this->DeleteBackupOnSiteDelete = $DeleteBackupOnSiteDelete;
            return $this;
        }

        /**
         * @return string
         */
        public function getCheckForLinuxUpdates()
        {
            return $this->CheckForLinuxUpdates;
        }

        /**
         * @param string $CheckForLinuxUpdates
         * @return $this
         */
        public function setCheckForLinuxUpdates($CheckForLinuxUpdates)
        {
            $this->CheckForLinuxUpdates = $CheckForLinuxUpdates;
            return $this;
        }

    }