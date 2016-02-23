<?php

namespace Mjr\Library\EntitiesBundle\Entity\Web;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\DirectiveSnippets;
use Mjr\Library\EntitiesBundle\Entity\Host\Ip;
use Mjr\Library\EntitiesBundle\Entity\ShellUser;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;
use Mjr\Library\EntitiesBundle\Entity\Domain as SystemDomain;

/**
 * @ORM\Table(name="web_domain")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Web
 * @author Chris Westerfield <chris@mjr.one>
 */
class WebDomain
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ServerTrait;
    use ActiveTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Ip", inversedBy="SitesV4", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="ipv4_address_id", referencedColumnName="id")
     * @var Ip
     */
    protected $IpV4Address;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Ip", inversedBy="SitesV6", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="ipv6_address_id", referencedColumnName="id")
     * @var Ip
     */
    protected $IpV6Address;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Domain", inversedBy="WebDomains", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id", nullable=true)
     * @var SystemDomain
     */
    protected $Domain;
    /**
     * @ORM\Column(name="domain_string", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $DomainString;
    /**
     * @ORM\Column(name="type", type="string", length=32, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", inversedBy="ChildDomains", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="parent_domain_id", referencedColumnName="id")
     * @var WebDomain
     */
    protected $ParentDomain;
    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", mappedBy="ParentDomain", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $ChildDomains;
    /**
     * @ORM\Column(name="vhost_type", type="string", length=32, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $VhostType;
    /**
     * @ORM\Column(name="web_folder", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $WebFolder;
    /**
     * @ORM\Column(name="document_root", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $DocumentRoot;
    /**
     * @ORM\Column(name="system_user", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SystemUser;
    /**
     * @ORM\Column(name="system_group", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SystemGroup;
    /**
     * @ORM\Column(name="hd_quota", type="bigint", precision=20, nullable=false, options={"default"=0})
     * @var string
     * @Gedmo\Versioned
     */
    protected $HdQuota;
    /**
     * @ORM\Column(name="traffic_quota", type="bigint", precision=20, nullable=false, options={"default"=-1})
     * @var string
     * @Gedmo\Versioned
     */
    protected $TrafficQuota;
    /**
     * @ORM\Column(name="sub_domain", type="string", length=255, nullable=true, options={"default"="none"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $SubDomain;
    /**
     * @ORM\Column(name="php_type", type="string", length=32, nullable=true, options={"default"="none"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $PhpType;
    /**
     * @ORM\Column(name="redirect_type", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $RedirectType;
    /**
     * @ORM\Column(name="redirect_path", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $RedirectPath;
    /**
     * @ORM\Column(name="seo_redirect", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SeoRedirect;
    /**
     * @ORM\Column(name="stats_password", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $StatsPassword;
    /**
     * @ORM\Column(name="pm_type", type="string", length=255, nullable=false, options={"default"="dynamic"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $PmType;
    /**
     * @ORM\Column(name="pm_max_children", type="integer", precision=11, nullable=false, options={"default"=10})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $PmMaxChildren;
    /**
     * @ORM\Column(name="pm_start_servers", type="integer", precision=11, nullable=false, options={"default"=1})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $PmStartServers;
    /**
     * @ORM\Column(name="pm_min_spare_servers", type="integer", precision=11, nullable=false, options={"default"=1})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $PmMinSpareServers;
    /**
     * @ORM\Column(name="pm_max_spare_servers", type="integer", precision=11, nullable=false, options={"default"=5})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $PmMaxSpareServers;
    /**
     * @ORM\Column(name="pm_process_idle_time_out", type="integer", precision=11, nullable=false, options={"default"=10})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $PmProcessIdleTimeOut;
    /**
     * @ORM\Column(name="pm_max_requests", type="integer", precision=11, nullable=false, options={"default"=0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $PmMaxRequests;
    /**
     * @ORM\Column(name="php_open_base_dir", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $PhpOpenBaseDir;
    /**
     * @ORM\Column(name="custom_php_ini", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $CustomPhpIni;
    /**
     * @ORM\Column(name="backup_interval", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $BackupInterval;
    /**
     * @ORM\Column(name="backup_copies", type="integer", precision=11, nullable=false, options={"default"=1})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $BackupCopies;
    /**
     * @ORM\Column(name="backup_exclude", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $BackupExclude;
    /**
     * @ORM\Column(name="http_port", type="integer", precision=11, nullable=false, options={"default"=80})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $HttpPort;
    /**
     * @ORM\Column(name="https_port", type="integer", precision=11, nullable=false, options={"default"=443})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $HttpsPort;
    /**
     * @ORM\Column(name="flag_cgi", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagCgi;
    /**
     * @ORM\Column(name="flag_ssi", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagSsi;
    /**
     * @ORM\Column(name="flag_su_exec", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagSuExec;
    /**
     * @ORM\Column(name="flag_error_docs", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagErrorDocs;
    /**
     * @ORM\Column(name="flag_sub_domain_www", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagSubDomainWww;
    /**
     * @ORM\Column(name="flag_php", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagPhp;
    /**
     * @ORM\Column(name="flag_ruby", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagRuby;
    /**
     * @ORM\Column(name="flag_perl", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagPerl;
    /**
     * @ORM\Column(name="flag_rewrite_to_https", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagRewriteToHttps;
    /**
     * @ORM\Column(name="flag_ssl", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagSSl;
    /**
     * @ORM\Column(name="flag_lets_encrypt", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagLetsEncrypt;
    /**
     * @ORM\Column(name="flag_traffic_quota_log", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagTrafficQuotaLog;
    /**
     * @ORM\Column(name="flag_spdy", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagSpdy;
    /**
     * @ORM\Column(name="flag_page_speed", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $FlagPageSpeed;
    /**
     * @ORM\Column(name="apache_directives", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $ApacheDirectives;
    /**
     * @ORM\Column(name="nginx_directives", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NginxDirectives;
    /**
     * @ORM\Column(name="proxy_directives", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $ProxyDirectives;
    /**
     * @ORM\Column(name="folder_directives", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $FolderDirectives;
    /**
     * @ORM\Column(name="rewrite_rules", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $RewriteRules;
    /**
     * @ORM\ManyToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\DirectiveSnippets", inversedBy="WebSites", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="web_domain_directives")
     * @var ArrayCollection
     */
    protected $WebServerDirectives;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\PhpVersion", inversedBy="WebSites", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="php_version_id", referencedColumnName="id")
     */
    protected $PhpVersion;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\Certificate", inversedBy="WebSites", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="ssl_certificate_id", referencedColumnName="id", nullable=true)
     * @var Certificate
     */
    protected $SslCertificate;

    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\Traffic", mappedBy="Domain", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $Traffics;

    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\ShellUser", mappedBy="Domain", fetch="EXTRA_LAZY")
     * @var ShellUser
     */
    protected $ShellUsers;

    /**
     * Domain constructor.
     */
    public function __construct()
    {
        $this->WebServerDirectives = new ArrayCollection();
        $this->Traffics = new ArrayCollection();
        $this->ShellUsers = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getTraffics()
    {
        return $this->Traffics;
    }

    /**
     * @param Traffic $traffic
     * @return bool
     */
    public function hasTraffic(Traffic $traffic)
    {
        return $this->Traffics->contains($traffic);
    }

    /**
     * @param Traffic $traffic
     * @return $this
     */
    public function addTraffic(Traffic $traffic)
    {
        if(!$this->hasTraffic($traffic))
        {
            $this->Traffics->add($traffic);
        }
        return $this;
    }

    /**
     * @param Traffic $traffic
     * @return $this
     */
    public function removeTraffic(Traffic $traffic)
    {
        if($this->hasTraffic($traffic))
        {
            $this->Traffics->removeElement($traffic);
        }
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getWebServerDirectives()
    {
        return $this->WebServerDirectives;
    }

    /**
     * @param DirectiveSnippets $snippet
     * @return bool
     */
    public function hasWebServerDirective(DirectiveSnippets $snippet)
    {
        return $this->WebServerDirectives->contains($snippet);
    }

    /**
     * @param DirectiveSnippets $snippet
     * @return $this
     */
    public function addWebServerDirective(DirectiveSnippets $snippet)
    {
        if(!$this->hasWebServerDirective($snippet))
        {
            $this->WebServerDirectives->add($snippet);
        }
        return $this;
    }

    /**
     * @param DirectiveSnippets $snippet
     * @return $this
     */
    public function removeWebServerDirective(DirectiveSnippets $snippet)
    {
        if($this->hasWebServerDirective($snippet))
        {
            $this->WebServerDirectives->removeElement($snippet);
        }
        return $this;
    }

    /**
     * @return Ip
     */
    public function getIpV4Address()
    {
        return $this->IpV4Address;
    }

    /**
     * @param Ip $IpV4Address
     * @return $this
     */
    public function setIpV4Address($IpV4Address)
    {
        $this->IpV4Address = $IpV4Address;
        return $this;
    }

    /**
     * @return Ip
     */
    public function getIpV6Address()
    {
        return $this->IpV6Address;
    }

    /**
     * @param Ip $IpV6Address
     * @return $this
     */
    public function setIpV6Address($IpV6Address)
    {
        $this->IpV6Address = $IpV6Address;
        return $this;
    }

    /**
     * @return SystemDomain
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * @param SystemDomain $Domain
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
    public function getDomainString()
    {
        return $this->DomainString;
    }

    /**
     * @param string $DomainString
     * @return $this
     */
    public function setDomainString($DomainString)
    {
        $this->DomainString = $DomainString;
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
    public function setParentDomain($ParentDomain)
    {
        $this->ParentDomain = $ParentDomain;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildDomains()
    {
        return $this->ChildDomains;
    }

    /**
     * @param WebDomain $domain
     * @return bool
     */
    public function hasChildDomain(WebDomain $domain)
    {
        return $this->ChildDomains->contains($domain);
    }

    /**
     * @param WebDomain $domain
     * @return $this
     */
    public function addChildDomain(WebDomain $domain)
    {
        if(!$this->hasChildDomain($domain))
        {
            $this->ChildDomains->add($domain);
        }
        return $this;
    }

    /**
     * @param WebDomain $domain
     * @return $this
     */
    public function removeChildDomain(WebDomain $domain)
    {
        if($this->hasChildDomain($domain))
        {
            $this->ChildDomains->removeElement($domain);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getVhostType()
    {
        return $this->VhostType;
    }

    /**
     * @param string $VhostType
     * @return $this
     */
    public function setVhostType($VhostType)
    {
        $this->VhostType = $VhostType;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebFolder()
    {
        return $this->WebFolder;
    }

    /**
     * @param string $WebFolder
     * @return $this
     */
    public function setWebFolder($WebFolder)
    {
        $this->WebFolder = $WebFolder;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentRoot()
    {
        return $this->DocumentRoot;
    }

    /**
     * @param string $DocumentRoot
     * @return $this
     */
    public function setDocumentRoot($DocumentRoot)
    {
        $this->DocumentRoot = $DocumentRoot;
        return $this;
    }

    /**
     * @return string
     */
    public function getSystemUser()
    {
        return $this->SystemUser;
    }

    /**
     * @param string $SystemUser
     * @return $this
     */
    public function setSystemUser($SystemUser)
    {
        $this->SystemUser = $SystemUser;
        return $this;
    }

    /**
     * @return string
     */
    public function getSystemGroup()
    {
        return $this->SystemGroup;
    }

    /**
     * @param string $SystemGroup
     * @return $this
     */
    public function setSystemGroup($SystemGroup)
    {
        $this->SystemGroup = $SystemGroup;
        return $this;
    }

    /**
     * @return string
     */
    public function getHdQuota()
    {
        return $this->HdQuota;
    }

    /**
     * @param string $HdQuota
     * @return $this
     */
    public function setHdQuota($HdQuota)
    {
        $this->HdQuota = $HdQuota;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrafficQuota()
    {
        return $this->TrafficQuota;
    }

    /**
     * @param string $TrafficQuota
     * @return $this
     */
    public function setTrafficQuota($TrafficQuota)
    {
        $this->TrafficQuota = $TrafficQuota;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubDomain()
    {
        return $this->SubDomain;
    }

    /**
     * @param string $SubDomain
     * @return $this
     */
    public function setSubDomain($SubDomain)
    {
        $this->SubDomain = $SubDomain;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhpType()
    {
        return $this->PhpType;
    }

    /**
     * @param string $PhpType
     * @return $this
     */
    public function setPhpType($PhpType)
    {
        $this->PhpType = $PhpType;
        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectType()
    {
        return $this->RedirectType;
    }

    /**
     * @param string $RedirectType
     * @return $this
     */
    public function setRedirectType($RedirectType)
    {
        $this->RedirectType = $RedirectType;
        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectPath()
    {
        return $this->RedirectPath;
    }

    /**
     * @param string $RedirectPath
     * @return $this
     */
    public function setRedirectPath($RedirectPath)
    {
        $this->RedirectPath = $RedirectPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeoRedirect()
    {
        return $this->SeoRedirect;
    }

    /**
     * @param string $SeoRedirect
     * @return $this
     */
    public function setSeoRedirect($SeoRedirect)
    {
        $this->SeoRedirect = $SeoRedirect;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatsPassword()
    {
        return $this->StatsPassword;
    }

    /**
     * @param string $StatsPassword
     * @return $this
     */
    public function setStatsPassword($StatsPassword)
    {
        $this->StatsPassword = $StatsPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getPmType()
    {
        return $this->PmType;
    }

    /**
     * @param string $PmType
     * @return $this
     */
    public function setPmType($PmType)
    {
        $this->PmType = $PmType;
        return $this;
    }

    /**
     * @return int
     */
    public function getPmMaxChildren()
    {
        return $this->PmMaxChildren;
    }

    /**
     * @param int $PmMaxChildren
     * @return $this
     */
    public function setPmMaxChildren($PmMaxChildren)
    {
        $this->PmMaxChildren = $PmMaxChildren;
        return $this;
    }

    /**
     * @return int
     */
    public function getPmStartServers()
    {
        return $this->PmStartServers;
    }

    /**
     * @param int $PmStartServers
     * @return $this
     */
    public function setPmStartServers($PmStartServers)
    {
        $this->PmStartServers = $PmStartServers;
        return $this;
    }

    /**
     * @return int
     */
    public function getPmMinSpareServers()
    {
        return $this->PmMinSpareServers;
    }

    /**
     * @param int $PmMinSpareServers
     * @return $this
     */
    public function setPmMinSpareServers($PmMinSpareServers)
    {
        $this->PmMinSpareServers = $PmMinSpareServers;
        return $this;
    }

    /**
     * @return int
     */
    public function getPmMaxSpareServers()
    {
        return $this->PmMaxSpareServers;
    }

    /**
     * @param int $PmMaxSpareServers
     * @return $this
     */
    public function setPmMaxSpareServers($PmMaxSpareServers)
    {
        $this->PmMaxSpareServers = $PmMaxSpareServers;
        return $this;
    }

    /**
     * @return int
     */
    public function getPmProcessIdleTimeOut()
    {
        return $this->PmProcessIdleTimeOut;
    }

    /**
     * @param int $PmProcessIdleTimeOut
     * @return $this
     */
    public function setPmProcessIdleTimeOut($PmProcessIdleTimeOut)
    {
        $this->PmProcessIdleTimeOut = $PmProcessIdleTimeOut;
        return $this;
    }

    /**
     * @return int
     */
    public function getPmMaxRequests()
    {
        return $this->PmMaxRequests;
    }

    /**
     * @param int $PmMaxRequests
     * @return $this
     */
    public function setPmMaxRequests($PmMaxRequests)
    {
        $this->PmMaxRequests = $PmMaxRequests;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhpOpenBaseDir()
    {
        return $this->PhpOpenBaseDir;
    }

    /**
     * @param string $PhpOpenBaseDir
     * @return $this
     */
    public function setPhpOpenBaseDir($PhpOpenBaseDir)
    {
        $this->PhpOpenBaseDir = $PhpOpenBaseDir;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomPhpIni()
    {
        return $this->CustomPhpIni;
    }

    /**
     * @param string $CustomPhpIni
     * @return $this
     */
    public function setCustomPhpIni($CustomPhpIni)
    {
        $this->CustomPhpIni = $CustomPhpIni;
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
     * @return int
     */
    public function getBackupCopies()
    {
        return $this->BackupCopies;
    }

    /**
     * @param int $BackupCopies
     * @return $this
     */
    public function setBackupCopies($BackupCopies)
    {
        $this->BackupCopies = $BackupCopies;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackupExclude()
    {
        return $this->BackupExclude;
    }

    /**
     * @param string $BackupExclude
     * @return $this
     */
    public function setBackupExclude($BackupExclude)
    {
        $this->BackupExclude = $BackupExclude;
        return $this;
    }

    /**
     * @return int
     */
    public function getHttpPort()
    {
        return $this->HttpPort;
    }

    /**
     * @param int $HttpPort
     * @return $this
     */
    public function setHttpPort($HttpPort)
    {
        $this->HttpPort = $HttpPort;
        return $this;
    }

    /**
     * @return int
     */
    public function getHttpsPort()
    {
        return $this->HttpsPort;
    }

    /**
     * @param int $HttpsPort
     * @return $this
     */
    public function setHttpsPort($HttpsPort)
    {
        $this->HttpsPort = $HttpsPort;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagCgi()
    {
        return $this->FlagCgi;
    }

    /**
     * @param boolean $FlagCgi
     * @return $this
     */
    public function setFlagCgi($FlagCgi)
    {
        $this->FlagCgi = $FlagCgi;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagSsi()
    {
        return $this->FlagSsi;
    }

    /**
     * @param boolean $FlagSsi
     * @return $this
     */
    public function setFlagSsi($FlagSsi)
    {
        $this->FlagSsi = $FlagSsi;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagSuExec()
    {
        return $this->FlagSuExec;
    }

    /**
     * @param boolean $FlagSuExec
     * @return $this
     */
    public function setFlagSuExec($FlagSuExec)
    {
        $this->FlagSuExec = $FlagSuExec;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagErrorDocs()
    {
        return $this->FlagErrorDocs;
    }

    /**
     * @param boolean $FlagErrorDocs
     * @return $this
     */
    public function setFlagErrorDocs($FlagErrorDocs)
    {
        $this->FlagErrorDocs = $FlagErrorDocs;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagSubDomainWww()
    {
        return $this->FlagSubDomainWww;
    }

    /**
     * @param boolean $FlagSubDomainWww
     * @return $this
     */
    public function setFlagSubDomainWww($FlagSubDomainWww)
    {
        $this->FlagSubDomainWww = $FlagSubDomainWww;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagPhp()
    {
        return $this->FlagPhp;
    }

    /**
     * @param boolean $FlagPhp
     * @return $this
     */
    public function setFlagPhp($FlagPhp)
    {
        $this->FlagPhp = $FlagPhp;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagRuby()
    {
        return $this->FlagRuby;
    }

    /**
     * @param boolean $FlagRuby
     * @return $this
     */
    public function setFlagRuby($FlagRuby)
    {
        $this->FlagRuby = $FlagRuby;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagPerl()
    {
        return $this->FlagPerl;
    }

    /**
     * @param boolean $FlagPerl
     * @return $this
     */
    public function setFlagPerl($FlagPerl)
    {
        $this->FlagPerl = $FlagPerl;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagRewriteToHttps()
    {
        return $this->FlagRewriteToHttps;
    }

    /**
     * @param boolean $FlagRewriteToHttps
     * @return $this
     */
    public function setFlagRewriteToHttps($FlagRewriteToHttps)
    {
        $this->FlagRewriteToHttps = $FlagRewriteToHttps;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagSSl()
    {
        return $this->FlagSSl;
    }

    /**
     * @param boolean $FlagSSl
     * @return $this
     */
    public function setFlagSSl($FlagSSl)
    {
        $this->FlagSSl = $FlagSSl;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagLetsEncrypt()
    {
        return $this->FlagLetsEncrypt;
    }

    /**
     * @param boolean $FlagLetsEncrypt
     * @return $this
     */
    public function setFlagLetsEncrypt($FlagLetsEncrypt)
    {
        $this->FlagLetsEncrypt = $FlagLetsEncrypt;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagTrafficQuotaLog()
    {
        return $this->FlagTrafficQuotaLog;
    }

    /**
     * @param boolean $FlagTrafficQuotaLog
     * @return $this
     */
    public function setFlagTrafficQuotaLog($FlagTrafficQuotaLog)
    {
        $this->FlagTrafficQuotaLog = $FlagTrafficQuotaLog;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagSpdy()
    {
        return $this->FlagSpdy;
    }

    /**
     * @param boolean $FlagSpdy
     * @return $this
     */
    public function setFlagSpdy($FlagSpdy)
    {
        $this->FlagSpdy = $FlagSpdy;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFlagPageSpeed()
    {
        return $this->FlagPageSpeed;
    }

    /**
     * @param boolean $FlagPageSpeed
     * @return $this
     */
    public function setFlagPageSpeed($FlagPageSpeed)
    {
        $this->FlagPageSpeed = $FlagPageSpeed;
        return $this;
    }

    /**
     * @return string
     */
    public function getApacheDirectives()
    {
        return $this->ApacheDirectives;
    }

    /**
     * @param string $ApacheDirectives
     * @return $this
     */
    public function setApacheDirectives($ApacheDirectives)
    {
        $this->ApacheDirectives = $ApacheDirectives;
        return $this;
    }

    /**
     * @return string
     */
    public function getNginxDirectives()
    {
        return $this->NginxDirectives;
    }

    /**
     * @param string $NginxDirectives
     * @return $this
     */
    public function setNginxDirectives($NginxDirectives)
    {
        $this->NginxDirectives = $NginxDirectives;
        return $this;
    }

    /**
     * @return string
     */
    public function getProxyDirectives()
    {
        return $this->ProxyDirectives;
    }

    /**
     * @param string $ProxyDirectives
     * @return $this
     */
    public function setProxyDirectives($ProxyDirectives)
    {
        $this->ProxyDirectives = $ProxyDirectives;
        return $this;
    }

    /**
     * @return string
     */
    public function getFolderDirectives()
    {
        return $this->FolderDirectives;
    }

    /**
     * @param string $FolderDirectives
     * @return $this
     */
    public function setFolderDirectives($FolderDirectives)
    {
        $this->FolderDirectives = $FolderDirectives;
        return $this;
    }

    /**
     * @return string
     */
    public function getRewriteRules()
    {
        return $this->RewriteRules;
    }

    /**
     * @param string $RewriteRules
     * @return $this
     */
    public function setRewriteRules($RewriteRules)
    {
        $this->RewriteRules = $RewriteRules;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhpVersion()
    {
        return $this->PhpVersion;
    }

    /**
     * @param mixed $PhpVersion
     * @return $this
     */
    public function setPhpVersion($PhpVersion)
    {
        $this->PhpVersion = $PhpVersion;
        return $this;
    }

    /**
     * @return Certificate
     */
    public function getSslCertificate()
    {
        return $this->SslCertificate;
    }

    /**
     * @param Certificate $SslCertificate
     * @return $this
     */
    public function setSslCertificate($SslCertificate)
    {
        $this->SslCertificate = $SslCertificate;
        return $this;
    }

    /**
     * @return ShellUser
     */
    public function getShellUsers()
    {
        return $this->ShellUsers;
    }

    /**
     * @param ShellUser $shellUser
     * @return mixed
     */
    public function hasShellUser(ShellUser $shellUser)
    {
        return $this->hasShellUser();
    }

    /**
     * @param ShellUser $shellUser
     * @return $this
     */
    public function ShellUser(ShellUser $shellUser)
    {
        if(!$this->hasShellUser($shellUser))
        {
            $this->ShellUsers->add($shellUser);
        }
        return $this;
    }

    /**
     * @param ShellUser $shellUser
     * @return $this
     */
    public function removeShellUser(ShellUser $shellUser)
    {
        if($this->hasShellUser($shellUser))
        {
            $this->ShellUsers->removeElement($shellUser);
        }
        return $this;
    }
}