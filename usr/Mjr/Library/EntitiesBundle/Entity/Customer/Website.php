<?php


namespace Mjr\Library\EntitiesBundle\Entity\Customer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;


/**
 * @ORM\Table(name="customer_website")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Customer
 * @author Chris Westerfield <chris@mjr.one>
 */
class Website
{
    use serializeTrait;
    use LogableTrait;
    use IdTrait;
    /**
     * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Main", inversedBy="Website", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * @var Main
     */
    protected $Customer;
    /**
     * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="host_id", referencedColumnName="id")
     * @var Main
     */
    protected $defaultHost;
    /**
     * @ORM\ManyToMany(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="customer_website_host",
     *     joinColumns={
     *          @ORM\JoinColumn(name="host_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={@ORM\JoinColumn(name="website_id", referencedColumnName="id", unique=true)}
     * )
     * @var ArrayCollection
     */
    protected $hosts;
    /**
     * @ORM\Column(name="php_disabled", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $phpDisabled;
    /**
     * @ORM\Column(name="php_fast_cgi", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $phpFastCGI;
    /**
     * @ORM\Column(name="php_cgi", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $phpCGI;
    /**
     * @ORM\Column(name="php_mod", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $phpMod;
    /**
     * @ORM\Column(name="php_su", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $phpSu;
    /**
     * @ORM\Column(name="php_fpm", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $phpFPM;
    /**
     * @ORM\Column(name="cgi", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Cgi;
    /**
     * @ORM\Column(name="ssi", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Ssi;
    /**
     * @ORM\Column(name="perl", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Perl;
    /**
     * @ORM\Column(name="ruby", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Ruby;
    /**
     * @ORM\Column(name="python", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Python;
    /**
     * @ORM\Column(name="su_exec", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $SuExec;
    /**
     * @ORM\Column(name="own_error", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $ownError;
    /**
     * @ORM\Column(name="wildcard", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $wildcard;
    /**
     * @ORM\Column(name="ssl", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $ssl;
    /**
     * @ORM\Column(name="lets_encrypt", type="boolean", nullable=false, options={"default": false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $letsEncrypt;
    /**
     * @ORM\Column(name="max_storage", type="bigint", nullable=false, options={"default": 0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxStorage;
    /**
     * @ORM\Column(name="max_traffic", type="bigint", nullable=false, options={"default": 0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxTraffic;
    /**
     * @ORM\Column(name="max_web_domains", type="integer", nullable=false, options={"default": 0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxWebDomains;
    /**
     * @ORM\Column(name="max_alias_domain", type="integer", nullable=false, options={"default": 0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxAliasDomain;
    /**
     * @ORM\Column(name="max_sub_domain", type="integer", nullable=false, options={"default": 0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxSubDomain;
    /**
     * @ORM\Column(name="max_ftp", type="integer", nullable=false, options={"default": 0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxFTP;
    /**
     * @ORM\Column(name="max_web_dav", type="integer", nullable=false, options={"default": 0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxWebDav;

    /**
     * Website constructor.
     */
    public function __construct()
    {
        $this->hosts = new ArrayCollection();
    }

    /**
     * @param Main $main
     * @return $this
     */
    public function addHost(Main $main)
    {
        $this->hosts->add($main);
        return $this;
    }

    /**
     * @param Main $main
     * @return bool
     */
    public function hasHost(Main $main)
    {
        return $this->hosts->contains($main);
    }

    /**
     * @return ArrayCollection
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * @param Main $main
     * @return bool
     */
    public function removeHost(Main $main)
    {
        if($this->hasHost($main))
        {
            $this->hosts->removeElement($main);
            return true;
        }
        return false;
    }

    /**
     * @return Main
     */
    public function getCustomer()
    {
        return $this->Customer;
    }

    /**
     * @param Main $Customer
     * @return $this
     */
    public function setCustomer($Customer)
    {
        $this->Customer = $Customer;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPhpDisabled()
    {
        return $this->phpDisabled;
    }

    /**
     * @param boolean $phpDisabled
     * @return $this
     */
    public function setPhpDisabled($phpDisabled)
    {
        $this->phpDisabled = $phpDisabled;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPhpFastCGI()
    {
        return $this->phpFastCGI;
    }

    /**
     * @param boolean $phpFastCGI
     * @return $this
     */
    public function setPhpFastCGI($phpFastCGI)
    {
        $this->phpFastCGI = $phpFastCGI;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPhpCGI()
    {
        return $this->phpCGI;
    }

    /**
     * @param boolean $phpCGI
     * @return $this
     */
    public function setPhpCGI($phpCGI)
    {
        $this->phpCGI = $phpCGI;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPhpMod()
    {
        return $this->phpMod;
    }

    /**
     * @param boolean $phpMod
     * @return $this
     */
    public function setPhpMod($phpMod)
    {
        $this->phpMod = $phpMod;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPhpSu()
    {
        return $this->phpSu;
    }

    /**
     * @param boolean $phpSu
     * @return $this
     */
    public function setPhpSu($phpSu)
    {
        $this->phpSu = $phpSu;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPhpFPM()
    {
        return $this->phpFPM;
    }

    /**
     * @param boolean $phpFPM
     * @return $this
     */
    public function setPhpFPM($phpFPM)
    {
        $this->phpFPM = $phpFPM;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCgi()
    {
        return $this->Cgi;
    }

    /**
     * @param boolean $Cgi
     * @return $this
     */
    public function setCgi($Cgi)
    {
        $this->Cgi = $Cgi;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSsi()
    {
        return $this->Ssi;
    }

    /**
     * @param boolean $Ssi
     * @return $this
     */
    public function setSsi($Ssi)
    {
        $this->Ssi = $Ssi;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPerl()
    {
        return $this->Perl;
    }

    /**
     * @param boolean $Perl
     * @return $this
     */
    public function setPerl($Perl)
    {
        $this->Perl = $Perl;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRuby()
    {
        return $this->Ruby;
    }

    /**
     * @param boolean $Ruby
     * @return $this
     */
    public function setRuby($Ruby)
    {
        $this->Ruby = $Ruby;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPython()
    {
        return $this->Python;
    }

    /**
     * @param boolean $Python
     * @return $this
     */
    public function setPython($Python)
    {
        $this->Python = $Python;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSuExec()
    {
        return $this->SuExec;
    }

    /**
     * @param boolean $SuExec
     * @return $this
     */
    public function setSuExec($SuExec)
    {
        $this->SuExec = $SuExec;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isOwnError()
    {
        return $this->ownError;
    }

    /**
     * @param boolean $ownError
     * @return $this
     */
    public function setOwnError($ownError)
    {
        $this->ownError = $ownError;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWildcard()
    {
        return $this->wildcard;
    }

    /**
     * @param boolean $wildcard
     * @return $this
     */
    public function setWildcard($wildcard)
    {
        $this->wildcard = $wildcard;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSsl()
    {
        return $this->ssl;
    }

    /**
     * @param boolean $ssl
     * @return $this
     */
    public function setSsl($ssl)
    {
        $this->ssl = $ssl;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isLetsEncrypt()
    {
        return $this->letsEncrypt;
    }

    /**
     * @param boolean $letsEncrypt
     * @return $this
     */
    public function setLetsEncrypt($letsEncrypt)
    {
        $this->letsEncrypt = $letsEncrypt;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxStorage()
    {
        return $this->maxStorage;
    }

    /**
     * @param int $maxStorage
     * @return $this
     */
    public function setMaxStorage($maxStorage)
    {
        $this->maxStorage = $maxStorage;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxTraffic()
    {
        return $this->maxTraffic;
    }

    /**
     * @param int $maxTraffic
     * @return $this
     */
    public function setMaxTraffic($maxTraffic)
    {
        $this->maxTraffic = $maxTraffic;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxWebDomains()
    {
        return $this->maxWebDomains;
    }

    /**
     * @param int $maxWebDomains
     * @return $this
     */
    public function setMaxWebDomains($maxWebDomains)
    {
        $this->maxWebDomains = $maxWebDomains;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxAliasDomain()
    {
        return $this->maxAliasDomain;
    }

    /**
     * @param int $maxAliasDomain
     * @return $this
     */
    public function setMaxAliasDomain($maxAliasDomain)
    {
        $this->maxAliasDomain = $maxAliasDomain;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxSubDomain()
    {
        return $this->maxSubDomain;
    }

    /**
     * @param int $maxSubDomain
     * @return $this
     */
    public function setMaxSubDomain($maxSubDomain)
    {
        $this->maxSubDomain = $maxSubDomain;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxFTP()
    {
        return $this->maxFTP;
    }

    /**
     * @param int $maxFTP
     * @return $this
     */
    public function setMaxFTP($maxFTP)
    {
        $this->maxFTP = $maxFTP;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxWebDav()
    {
        return $this->maxWebDav;
    }

    /**
     * @param int $maxWebDav
     * @return $this
     */
    public function setMaxWebDav($maxWebDav)
    {
        $this->maxWebDav = $maxWebDav;
        return $this;
    }

    /**
     * @return Main
     */
    public function getDefaultHost()
    {
        return $this->defaultHost;
    }

    /**
     * @param Main $defaultHost
     * @return $this
     */
    public function setDefaultHost($defaultHost)
    {
        $this->defaultHost = $defaultHost;
        return $this;
    }

}