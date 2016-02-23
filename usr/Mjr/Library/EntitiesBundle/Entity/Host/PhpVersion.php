<?php


namespace Mjr\Library\EntitiesBundle\Entity\Host;

use Doctrine\Common\Collections\ArrayCollection;
use Mjr\Library\EntitiesBundle\Entity\Web\WebDomain;
use Mjr\Library\EntitiesBundle\Traits\CustomerTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;


/**
 * @ORM\Table(name="host_phpversion")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Host
 * @author Chris Westerfield <chris@mjr.one>
 */
class PhpVersion
{
    use SystemGroupTrait;
    use SystemUserTrait;
    use CustomerTrait;
    use LogableTrait;
    use IdTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="server_id", referencedColumnName="id")
     * @var Main
     */
    protected $Server;
    /**
     * @ORM\Column(name="name", type="string", length=80, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="fast_cgi_binary", type="string", length=80, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $FastCgiBinary;
    /**
     * @ORM\Column(name="fast_cgi_ini_dir", type="string", length=80, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $FastCgiIniDir;
    /**
     * @ORM\Column(name="fpm_init_script", type="string", length=80, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $FpmInitScript;
    /**
     * @ORM\Column(name="fpm_ini_dir", type="string", length=80, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $FpmIniDir;
    /**
     * @ORM\Column(name="fpm_pool_dir", type="string", length=80, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $FpmPoolDir;

    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", mappedBy="PhpVersion", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $WebSites;

    public function __construct()
    {
        $this->WebSites = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getWebsites()
    {
        return $this->WebSites;
    }

    /**
     * @param WebDomain $domain
     * @return bool
     */
    public function hasWebSite(WebDomain $domain)
    {
        return $this->WebSites->contains($domain);
    }

    /**
     * @param WebDomain $domain
     * @return $this
     */
    public function addWebSite(WebDomain $domain)
    {
        if(!$this->hasWebSite($domain))
        {
            $this->WebSites->add($domain);
        }
        return $this;
    }

    /**
     * @param WebDomain $domain
     * @return $this
     */
    public function removeWebSite(WebDomain $domain)
    {
        if($this->hasWebSite($domain))
        {
            $this->WebSites->removeElement($domain);
        }
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
    public function getFastCgiBinary()
    {
        return $this->FastCgiBinary;
    }

    /**
     * @param string $FastCgiBinary
     * @return $this
     */
    public function setFastCgiBinary($FastCgiBinary)
    {
        $this->FastCgiBinary = $FastCgiBinary;
        return $this;
    }

    /**
     * @return string
     */
    public function getFastCgiIniDir()
    {
        return $this->FastCgiIniDir;
    }

    /**
     * @param string $FastCgiIniDir
     * @return $this
     */
    public function setFastCgiIniDir($FastCgiIniDir)
    {
        $this->FastCgiIniDir = $FastCgiIniDir;
        return $this;
    }

    /**
     * @return string
     */
    public function getFpmInitScript()
    {
        return $this->FpmInitScript;
    }

    /**
     * @param string $FpmInitScript
     * @return $this
     */
    public function setFpmInitScript($FpmInitScript)
    {
        $this->FpmInitScript = $FpmInitScript;
        return $this;
    }

    /**
     * @return string
     */
    public function getFpmIniDir()
    {
        return $this->FpmIniDir;
    }

    /**
     * @param string $FpmIniDir
     * @return $this
     */
    public function setFpmIniDir($FpmIniDir)
    {
        $this->FpmIniDir = $FpmIniDir;
        return $this;
    }

    /**
     * @return string
     */
    public function getFpmPoolDir()
    {
        return $this->FpmPoolDir;
    }

    /**
     * @param string $FpmPoolDir
     * @return $this
     */
    public function setFpmPoolDir($FpmPoolDir)
    {
        $this->FpmPoolDir = $FpmPoolDir;
        return $this;
    }

}