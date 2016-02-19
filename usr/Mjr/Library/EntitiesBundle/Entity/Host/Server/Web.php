<?php

namespace Mjr\Library\EntitiesBundle\Entity\Host\Server;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;

/**
 * @ORM\Table(name="host_config_web")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\System\Server
 * @author Chris Westerfield <chris@mjr.one>
 */
class Web
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
     * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY",inversedBy="ConfigWeb")
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
     * @ORM\Column(name="base_directory", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $BaseDirectory;
    /**
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $Path;
    /**
     * @ORM\Column(name="sym_links", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $SymLinks;
    /**
     * @ORM\Column(name="create_relative_sym_links", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $CreateRelativeSymLinks;
    /**
     * @ORM\Column(name="network_file_system", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $NetworkFileSystem;
    /**
     * @ORM\Column(name="website_auto_alias", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $WebsiteAutoAlias;
    /**
     * @ORM\Column(name="vhost_config_file_path", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $vHostConfigFilePath;
    /**
     * @ORM\Column(name="vhost_config_file_enabled_path", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $vHostConfigFileEnabledPath;
    /**
     * @ORM\Column(name="security_level", type="string", length=50, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $SecurityLevel;
    /**
     * @ORM\Column(name="rewrite_ipv6on_mirror", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $RewriteIpv6OnMirror;
    /**
     * @ORM\Column(name="web_user", type="string", length=80, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $WebUser;
    /**
     * @ORM\Column(name="web_user_group", type="string", length=80, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $WebUserGroup;
    /**
     * @ORM\Column(name="ip_address_wild_card", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $IpAddressWildCard;
    /**
     * @ORM\Column(name="test_configuration_restart", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $TestConfigurationRestart;
    /**
     * @ORM\Column(name="enable_wild_card", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $EnableWildCard;
    /**
     * @ORM\Column(name="send_over_traffic_notification_to_admin", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $SendOverTrafficNotificationToAdmin;
    /**
     * @ORM\Column(name="send_over_traffic_notification_to_client", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $SendOverTrafficNotificationToClient;
    /**
     * @ORM\Column(name="send_quota_warnings_to_admin", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $SendQuotaWarningsToAdmin;
    /**
     * @ORM\Column(name="send_quota_warning_to_client", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $SendQuotaWarningToClient;
    /**
     * @ORM\Column(name="send_db_quota_warning_to_admin", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $SendDbQuotaWarningToAdmin;
    /**
     * @ORM\Column(name="send_db_quota_warning_to_client", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $SendDbQuotaWarningToClient;
    /**
     * @ORM\Column(name="send_quota_warning_each_days", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $SendQuotaWarningEachDays;
    /**
     * @ORM\Column(name="send_quota_ok_to_client", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $SendQuotaOkToClient;
    /**
     * @ORM\Column(name="enable_sni", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $EnableSni;
    /**
     * @ORM\Column(name="spdy_available", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $SpdyAvailable;
    /**
     * @ORM\Column(name="ca_path", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $CaPath;
    /**
     * @ORM\Column(name="ca_pass_phrase", type="string", length=80, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $CaPassPhrase;
    /**
     * @ORM\Column(name="set_folder_permissions_on_update", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $SetFolderPermissionsOnUpdate;
    /**
     * @ORM\Column(name="make_web_folrder_immutable", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $MakeWebFolrderImmutable;
    /**
     * @ORM\Column(name="add_web_users_to_ssh_user_group", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $AddWebUsersToSshUserGroup;
    /**
     * @ORM\Column(name="connect_linux_user_id_to_web_id", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $ConnectLinuxUserIdToWebId;
    /**
     * @ORM\Column(name="start_id_for_user_id_web_id_connection", type="integer", precision=6, nullable=true)
     * @Gedmo\Versioned()
     * @var integer
     */
    protected $StartIdForUserIdWebIdConnection;
    /**
     * @ORM\Column(name="apache_php_ini_path", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $ApachePhpIniPath;
    /**
     * @ORM\Column(name="cgi_php_ini_path", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $CgiPhpIniPath;
    /**
     * @ORM\Column(name="php_fpm_init_script", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $PhpFpmInitScript;
    /**
     * @ORM\Column(name="php_fpm_pool_directory", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $PhpFpmPoolDirectory;
    /**
     * @ORM\Column(name="php_fpm_start_port", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $PhpFpmStartPort;
    /**
     * @ORM\Column(name="php_fpm_socket_directory", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $PhpFpmSocketDirectory;
    /**
     * @ORM\Column(name="php_open_base_directory", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $PhpOpenBaseDirectory;
    /**
     * @ORM\Column(name="check_php_ini_for_changes_in_minutes", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $CheckPhpIniForChangesInMinutes;
    /**
     * @ORM\Column(name="default_php_handler", type="string", length=50, nullable=true)
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $DefaultPhpHandler;
    /**
     * @ORM\Column(name="appv_host_enabled", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $AppvHostEnabled;
    /**
     * @ORM\Column(name="appv_host_port", type="integer", precision=6, nullable=true)
     * @Gedmo\Versioned()
     * @var integer
     */
    protected $AppvHostPort;
    /**
     * @ORM\Column(name="appv_host_ip_address", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $AppvHostIpAddress;
    /**
     * @ORM\Column(name="appv_host_domain_name", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $AppvHostDomainName;
    /**
     * @ORM\Column(name="aw_stats_conf_folder", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $AwStatsConfFolder;
    /**
     * @ORM\Column(name="aw_stats_data_folder", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $AwStatsDataFolder;
    /**
     * @ORM\Column(name="aw_stats_pl_script", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $AwStatsPlScript;
    /**
     * @ORM\Column(name="aw_stats_build_static_pages_pl_script", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $AwStatsBuildStaticPagesPlScript;

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
    public function getBaseDirectory()
    {
        return $this->BaseDirectory;
    }

    /**
     * @param string $BaseDirectory
     * @return $this
     */
    public function setBaseDirectory($BaseDirectory)
    {
        $this->BaseDirectory = $BaseDirectory;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->Path;
    }

    /**
     * @param string $Path
     * @return $this
     */
    public function setPath($Path)
    {
        $this->Path = $Path;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymLinks()
    {
        return $this->SymLinks;
    }

    /**
     * @param string $SymLinks
     * @return $this
     */
    public function setSymLinks($SymLinks)
    {
        $this->SymLinks = $SymLinks;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCreateRelativeSymLinks()
    {
        return $this->CreateRelativeSymLinks;
    }

    /**
     * @param bool $CreateRelativeSymLinks
     * @return $this
     */
    public function setCreateRelativeSymLinks($CreateRelativeSymLinks)
    {
        $this->CreateRelativeSymLinks = $CreateRelativeSymLinks;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isNetworkFileSystem()
    {
        return $this->NetworkFileSystem;
    }

    /**
     * @param boolean $NetworkFileSystem
     * @return $this
     */
    public function setNetworkFileSystem($NetworkFileSystem)
    {
        $this->NetworkFileSystem = $NetworkFileSystem;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsiteAutoAlias()
    {
        return $this->WebsiteAutoAlias;
    }

    /**
     * @param string $WebsiteAutoAlias
     * @return $this
     */
    public function setWebsiteAutoAlias($WebsiteAutoAlias)
    {
        $this->WebsiteAutoAlias = $WebsiteAutoAlias;
        return $this;
    }

    /**
     * @return string
     */
    public function getVHostConfigFilePath()
    {
        return $this->vHostConfigFilePath;
    }

    /**
     * @param string $vHostConfigFilePath
     * @return $this
     */
    public function setVHostConfigFilePath($vHostConfigFilePath)
    {
        $this->vHostConfigFilePath = $vHostConfigFilePath;
        return $this;
    }

    /**
     * @return string
     */
    public function getVHostConfigFileEnabledPath()
    {
        return $this->vHostConfigFileEnabledPath;
    }

    /**
     * @param string $vHostConfigFileEnabledPath
     * @return $this
     */
    public function setVHostConfigFileEnabledPath($vHostConfigFileEnabledPath)
    {
        $this->vHostConfigFileEnabledPath = $vHostConfigFileEnabledPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecurityLevel()
    {
        return $this->SecurityLevel;
    }

    /**
     * @param string $SecurityLevel
     * @return $this
     */
    public function setSecurityLevel($SecurityLevel)
    {
        $this->SecurityLevel = $SecurityLevel;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRewriteIpv6OnMirror()
    {
        return $this->RewriteIpv6OnMirror;
    }

    /**
     * @param boolean $RewriteIpv6OnMirror
     * @return $this
     */
    public function setRewriteIpv6OnMirror($RewriteIpv6OnMirror)
    {
        $this->RewriteIpv6OnMirror = $RewriteIpv6OnMirror;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebUser()
    {
        return $this->WebUser;
    }

    /**
     * @param string $WebUser
     * @return $this
     */
    public function setWebUser($WebUser)
    {
        $this->WebUser = $WebUser;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebUserGroup()
    {
        return $this->WebUserGroup;
    }

    /**
     * @param string $WebUserGroup
     * @return $this
     */
    public function setWebUserGroup($WebUserGroup)
    {
        $this->WebUserGroup = $WebUserGroup;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIpAddressWildCard()
    {
        return $this->IpAddressWildCard;
    }

    /**
     * @param boolean $IpAddressWildCard
     * @return $this
     */
    public function setIpAddressWildCard($IpAddressWildCard)
    {
        $this->IpAddressWildCard = $IpAddressWildCard;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isTestConfigurationRestart()
    {
        return $this->TestConfigurationRestart;
    }

    /**
     * @param boolean $TestConfigurationRestart
     * @return $this
     */
    public function setTestConfigurationRestart($TestConfigurationRestart)
    {
        $this->TestConfigurationRestart = $TestConfigurationRestart;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEnableWildCard()
    {
        return $this->EnableWildCard;
    }

    /**
     * @param boolean $EnableWildCard
     * @return $this
     */
    public function setEnableWildCard($EnableWildCard)
    {
        $this->EnableWildCard = $EnableWildCard;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSendOverTrafficNotificationToAdmin()
    {
        return $this->SendOverTrafficNotificationToAdmin;
    }

    /**
     * @param boolean $SendOverTrafficNotificationToAdmin
     * @return $this
     */
    public function setSendOverTrafficNotificationToAdmin($SendOverTrafficNotificationToAdmin)
    {
        $this->SendOverTrafficNotificationToAdmin = $SendOverTrafficNotificationToAdmin;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSendOverTrafficNotificationToClient()
    {
        return $this->SendOverTrafficNotificationToClient;
    }

    /**
     * @param boolean $SendOverTrafficNotificationToClient
     * @return $this
     */
    public function setSendOverTrafficNotificationToClient($SendOverTrafficNotificationToClient)
    {
        $this->SendOverTrafficNotificationToClient = $SendOverTrafficNotificationToClient;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSendQuotaWarningsToAdmin()
    {
        return $this->SendQuotaWarningsToAdmin;
    }

    /**
     * @param boolean $SendQuotaWarningsToAdmin
     * @return $this
     */
    public function setSendQuotaWarningsToAdmin($SendQuotaWarningsToAdmin)
    {
        $this->SendQuotaWarningsToAdmin = $SendQuotaWarningsToAdmin;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSendQuotaWarningToClient()
    {
        return $this->SendQuotaWarningToClient;
    }

    /**
     * @param boolean $SendQuotaWarningToClient
     * @return $this
     */
    public function setSendQuotaWarningToClient($SendQuotaWarningToClient)
    {
        $this->SendQuotaWarningToClient = $SendQuotaWarningToClient;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSendDbQuotaWarningToAdmin()
    {
        return $this->SendDbQuotaWarningToAdmin;
    }

    /**
     * @param boolean $SendDbQuotaWarningToAdmin
     * @return $this
     */
    public function setSendDbQuotaWarningToAdmin($SendDbQuotaWarningToAdmin)
    {
        $this->SendDbQuotaWarningToAdmin = $SendDbQuotaWarningToAdmin;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSendDbQuotaWarningToClient()
    {
        return $this->SendDbQuotaWarningToClient;
    }

    /**
     * @param boolean $SendDbQuotaWarningToClient
     * @return $this
     */
    public function setSendDbQuotaWarningToClient($SendDbQuotaWarningToClient)
    {
        $this->SendDbQuotaWarningToClient = $SendDbQuotaWarningToClient;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSendQuotaWarningEachDays()
    {
        return $this->SendQuotaWarningEachDays;
    }

    /**
     * @param boolean $SendQuotaWarningEachDays
     * @return $this
     */
    public function setSendQuotaWarningEachDays($SendQuotaWarningEachDays)
    {
        $this->SendQuotaWarningEachDays = $SendQuotaWarningEachDays;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSendQuotaOkToClient()
    {
        return $this->SendQuotaOkToClient;
    }

    /**
     * @param boolean $SendQuotaOkToClient
     * @return $this
     */
    public function setSendQuotaOkToClient($SendQuotaOkToClient)
    {
        $this->SendQuotaOkToClient = $SendQuotaOkToClient;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEnableSni()
    {
        return $this->EnableSni;
    }

    /**
     * @param boolean $EnableSni
     * @return $this
     */
    public function setEnableSni($EnableSni)
    {
        $this->EnableSni = $EnableSni;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSpdyAvailable()
    {
        return $this->SpdyAvailable;
    }

    /**
     * @param boolean $SpdyAvailable
     * @return $this
     */
    public function setSpdyAvailable($SpdyAvailable)
    {
        $this->SpdyAvailable = $SpdyAvailable;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaPath()
    {
        return $this->CaPath;
    }

    /**
     * @param string $CaPath
     * @return $this
     */
    public function setCaPath($CaPath)
    {
        $this->CaPath = $CaPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaPassPhrase()
    {
        return $this->CaPassPhrase;
    }

    /**
     * @param string $CaPassPhrase
     * @return $this
     */
    public function setCaPassPhrase($CaPassPhrase)
    {
        $this->CaPassPhrase = $CaPassPhrase;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSetFolderPermissionsOnUpdate()
    {
        return $this->SetFolderPermissionsOnUpdate;
    }

    /**
     * @param boolean $SetFolderPermissionsOnUpdate
     * @return $this
     */
    public function setSetFolderPermissionsOnUpdate($SetFolderPermissionsOnUpdate)
    {
        $this->SetFolderPermissionsOnUpdate = $SetFolderPermissionsOnUpdate;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMakeWebFolrderImmutable()
    {
        return $this->MakeWebFolrderImmutable;
    }

    /**
     * @param boolean $MakeWebFolrderImmutable
     * @return $this
     */
    public function setMakeWebFolrderImmutable($MakeWebFolrderImmutable)
    {
        $this->MakeWebFolrderImmutable = $MakeWebFolrderImmutable;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAddWebUsersToSshUserGroup()
    {
        return $this->AddWebUsersToSshUserGroup;
    }

    /**
     * @param boolean $AddWebUsersToSshUserGroup
     * @return $this
     */
    public function setAddWebUsersToSshUserGroup($AddWebUsersToSshUserGroup)
    {
        $this->AddWebUsersToSshUserGroup = $AddWebUsersToSshUserGroup;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isConnectLinuxUserIdToWebId()
    {
        return $this->ConnectLinuxUserIdToWebId;
    }

    /**
     * @param boolean $ConnectLinuxUserIdToWebId
     * @return $this
     */
    public function setConnectLinuxUserIdToWebId($ConnectLinuxUserIdToWebId)
    {
        $this->ConnectLinuxUserIdToWebId = $ConnectLinuxUserIdToWebId;
        return $this;
    }

    /**
     * @return int
     */
    public function getStartIdForUserIdWebIdConnection()
    {
        return $this->StartIdForUserIdWebIdConnection;
    }

    /**
     * @param int $StartIdForUserIdWebIdConnection
     * @return $this
     */
    public function setStartIdForUserIdWebIdConnection($StartIdForUserIdWebIdConnection)
    {
        $this->StartIdForUserIdWebIdConnection = $StartIdForUserIdWebIdConnection;
        return $this;
    }

    /**
     * @return string
     */
    public function getApachePhpIniPath()
    {
        return $this->ApachePhpIniPath;
    }

    /**
     * @param string $ApachePhpIniPath
     * @return $this
     */
    public function setApachePhpIniPath($ApachePhpIniPath)
    {
        $this->ApachePhpIniPath = $ApachePhpIniPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getCgiPhpIniPath()
    {
        return $this->CgiPhpIniPath;
    }

    /**
     * @param string $CgiPhpIniPath
     * @return $this
     */
    public function setCgiPhpIniPath($CgiPhpIniPath)
    {
        $this->CgiPhpIniPath = $CgiPhpIniPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhpFpmInitScript()
    {
        return $this->PhpFpmInitScript;
    }

    /**
     * @param string $PhpFpmInitScript
     * @return $this
     */
    public function setPhpFpmInitScript($PhpFpmInitScript)
    {
        $this->PhpFpmInitScript = $PhpFpmInitScript;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhpFpmPoolDirectory()
    {
        return $this->PhpFpmPoolDirectory;
    }

    /**
     * @param string $PhpFpmPoolDirectory
     * @return $this
     */
    public function setPhpFpmPoolDirectory($PhpFpmPoolDirectory)
    {
        $this->PhpFpmPoolDirectory = $PhpFpmPoolDirectory;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhpFpmStartPort()
    {
        return $this->PhpFpmStartPort;
    }

    /**
     * @param string $PhpFpmStartPort
     * @return $this
     */
    public function setPhpFpmStartPort($PhpFpmStartPort)
    {
        $this->PhpFpmStartPort = $PhpFpmStartPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhpFpmSocketDirectory()
    {
        return $this->PhpFpmSocketDirectory;
    }

    /**
     * @param string $PhpFpmSocketDirectory
     * @return $this
     */
    public function setPhpFpmSocketDirectory($PhpFpmSocketDirectory)
    {
        $this->PhpFpmSocketDirectory = $PhpFpmSocketDirectory;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhpOpenBaseDirectory()
    {
        return $this->PhpOpenBaseDirectory;
    }

    /**
     * @param string $PhpOpenBaseDirectory
     * @return $this
     */
    public function setPhpOpenBaseDirectory($PhpOpenBaseDirectory)
    {
        $this->PhpOpenBaseDirectory = $PhpOpenBaseDirectory;
        return $this;
    }

    /**
     * @return string
     */
    public function getCheckPhpIniForChangesInMinutes()
    {
        return $this->CheckPhpIniForChangesInMinutes;
    }

    /**
     * @param string $CheckPhpIniForChangesInMinutes
     * @return $this
     */
    public function setCheckPhpIniForChangesInMinutes($CheckPhpIniForChangesInMinutes)
    {
        $this->CheckPhpIniForChangesInMinutes = $CheckPhpIniForChangesInMinutes;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDefaultPhpHandler()
    {
        return $this->DefaultPhpHandler;
    }

    /**
     * @param boolean $DefaultPhpHandler
     * @return $this
     */
    public function setDefaultPhpHandler($DefaultPhpHandler)
    {
        $this->DefaultPhpHandler = $DefaultPhpHandler;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAppvHostEnabled()
    {
        return $this->AppvHostEnabled;
    }

    /**
     * @param boolean $AppvHostEnabled
     * @return $this
     */
    public function setAppvHostEnabled($AppvHostEnabled)
    {
        $this->AppvHostEnabled = $AppvHostEnabled;
        return $this;
    }

    /**
     * @return int
     */
    public function getAppvHostPort()
    {
        return $this->AppvHostPort;
    }

    /**
     * @param int $AppvHostPort
     * @return $this
     */
    public function setAppvHostPort($AppvHostPort)
    {
        $this->AppvHostPort = $AppvHostPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppvHostIpAddress()
    {
        return $this->AppvHostIpAddress;
    }

    /**
     * @param string $AppvHostIpAddress
     * @return $this
     */
    public function setAppvHostIpAddress($AppvHostIpAddress)
    {
        $this->AppvHostIpAddress = $AppvHostIpAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppvHostDomainName()
    {
        return $this->AppvHostDomainName;
    }

    /**
     * @param string $AppvHostDomainName
     * @return $this
     */
    public function setAppvHostDomainName($AppvHostDomainName)
    {
        $this->AppvHostDomainName = $AppvHostDomainName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAwStatsConfFolder()
    {
        return $this->AwStatsConfFolder;
    }

    /**
     * @param string $AwStatsConfFolder
     * @return $this
     */
    public function setAwStatsConfFolder($AwStatsConfFolder)
    {
        $this->AwStatsConfFolder = $AwStatsConfFolder;
        return $this;
    }

    /**
     * @return string
     */
    public function getAwStatsDataFolder()
    {
        return $this->AwStatsDataFolder;
    }

    /**
     * @param string $AwStatsDataFolder
     * @return $this
     */
    public function setAwStatsDataFolder($AwStatsDataFolder)
    {
        $this->AwStatsDataFolder = $AwStatsDataFolder;
        return $this;
    }

    /**
     * @return string
     */
    public function getAwStatsPlScript()
    {
        return $this->AwStatsPlScript;
    }

    /**
     * @param string $AwStatsPlScript
     * @return $this
     */
    public function setAwStatsPlScript($AwStatsPlScript)
    {
        $this->AwStatsPlScript = $AwStatsPlScript;
        return $this;
    }

    /**
     * @return string
     */
    public function getAwStatsBuildStaticPagesPlScript()
    {
        return $this->AwStatsBuildStaticPagesPlScript;
    }

    /**
     * @param string $AwStatsBuildStaticPagesPlScript
     * @return $this
     */
    public function setAwStatsBuildStaticPagesPlScript($AwStatsBuildStaticPagesPlScript)
    {
        $this->AwStatsBuildStaticPagesPlScript = $AwStatsBuildStaticPagesPlScript;
        return $this;
    }

}