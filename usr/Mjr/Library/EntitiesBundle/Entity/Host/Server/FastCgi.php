<?php

namespace Mjr\Library\EntitiesBundle\Entity\Host\Server;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;

/**
 * @ORM\Table(name="host_config_fastcgi")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\System\Server
 * @author Chris Westerfield <chris@mjr.one>
 */
class FastCgi
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
     * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY", inversedBy="ConfigFastCgi")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @var Main
     */
    protected $Server;
    /**
     * @ORM\Column(name="fast_cgi_starter_path", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $FastCgiStarterPath;
    /**
     * @ORM\Column(name="fast_cgi_starter_script", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $FastCgiStarterScript;
    /**
     * @ORM\Column(name="fast_cgi_alias", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $FastCgiAlias;
    /**
     * @ORM\Column(name="fast_cgi_php_ini_path", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $FastCgiPhpIniPath;
    /**
     * @ORM\Column(name="fast_cgi_children", type="string", length=4, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $FastCgiChildren;
    /**
     * @ORM\Column(name="fast_cgi_max_requests", type="string", length=6, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $FastCgiMaxRequests;
    /**
     * @ORM\Column(name="fast_cgi_bin", type="string", length=255, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $FastCgiBin;
    /**
     * @ORM\Column(name="fast_cgi_config_syntax", type="string", length=50, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $FastCgiConfigSyntax;

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
    public function getFastCgiStarterPath()
    {
        return $this->FastCgiStarterPath;
    }

    /**
     * @param string $FastCgiStarterPath
     * @return $this
     */
    public function setFastCgiStarterPath($FastCgiStarterPath)
    {
        $this->FastCgiStarterPath = $FastCgiStarterPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getFastCgiStarterScript()
    {
        return $this->FastCgiStarterScript;
    }

    /**
     * @param string $FastCgiStarterScript
     * @return $this
     */
    public function setFastCgiStarterScript($FastCgiStarterScript)
    {
        $this->FastCgiStarterScript = $FastCgiStarterScript;
        return $this;
    }

    /**
     * @return string
     */
    public function getFastCgiAlias()
    {
        return $this->FastCgiAlias;
    }

    /**
     * @param string $FastCgiAlias
     * @return $this
     */
    public function setFastCgiAlias($FastCgiAlias)
    {
        $this->FastCgiAlias = $FastCgiAlias;
        return $this;
    }

    /**
     * @return string
     */
    public function getFastCgiPhpIniPath()
    {
        return $this->FastCgiPhpIniPath;
    }

    /**
     * @param string $FastCgiPhpIniPath
     * @return $this
     */
    public function setFastCgiPhpIniPath($FastCgiPhpIniPath)
    {
        $this->FastCgiPhpIniPath = $FastCgiPhpIniPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getFastCgiChildren()
    {
        return $this->FastCgiChildren;
    }

    /**
     * @param string $FastCgiChildren
     * @return $this
     */
    public function setFastCgiChildren($FastCgiChildren)
    {
        $this->FastCgiChildren = $FastCgiChildren;
        return $this;
    }

    /**
     * @return string
     */
    public function getFastCgiMaxRequests()
    {
        return $this->FastCgiMaxRequests;
    }

    /**
     * @param string $FastCgiMaxRequests
     * @return $this
     */
    public function setFastCgiMaxRequests($FastCgiMaxRequests)
    {
        $this->FastCgiMaxRequests = $FastCgiMaxRequests;
        return $this;
    }

    /**
     * @return string
     */
    public function getFastCgiBin()
    {
        return $this->FastCgiBin;
    }

    /**
     * @param string $FastCgiBin
     * @return $this
     */
    public function setFastCgiBin($FastCgiBin)
    {
        $this->FastCgiBin = $FastCgiBin;
        return $this;
    }

    /**
     * @return string
     */
    public function getFastCgiConfigSyntax()
    {
        return $this->FastCgiConfigSyntax;
    }

    /**
     * @param string $FastCgiConfigSyntax
     * @return $this
     */
    public function setFastCgiConfigSyntax($FastCgiConfigSyntax)
    {
        $this->FastCgiConfigSyntax = $FastCgiConfigSyntax;
        return $this;
    }

}