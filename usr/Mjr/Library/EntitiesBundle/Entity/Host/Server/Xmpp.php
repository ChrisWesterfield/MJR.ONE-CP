<?php

namespace Mjr\Library\EntitiesBundle\Entity\Host\Server;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;

/**
 * @ORM\Table(name="host_config_xmpp")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\System\Server
 * @author Chris Westerfield <chris@mjr.one>
 */
class Xmpp
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
     * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY", inversedBy="ConfigXmpp")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @var Main
     */
    protected $Server;
    /**
     * @ORM\Column(name="use_ipv6", type="boolean",nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $UseIpv6;
    /**
     * @ORM\Column(name="max_bosh_inavtivity_time", type="string", length=5, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $MaxBoshInavtivityTime;
    /**
     * @ORM\Column(name="server_admins", type="text", nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $ServerAdmins;
    /**
     * @ORM\Column(name="server_wide_enabled_plugins", type="text", nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $ServerWideEnabledPlugins;
    /**
     * @ORM\Column(name="http_port", type="integer", precision=6, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $HttpPort;
    /**
     * @ORM\Column(name="https_port", type="integer", precision=6, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $HttpsPort;
    /**
     * @ORM\Column(name="paste_bin_port", type="integer", precision=6, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $PasteBinPort;
    /**
     * @ORM\Column(name="bosh_port", type="integer", precision=6, nullable=true)
     * @Gedmo\Versioned()
     * @var string
     */
    protected $BoshPort;

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
     * @return bool
     */
    public function isUseIpv6()
    {
        return $this->UseIpv6;
    }

    /**
     * @param bool $UseIpv6
     * @return $this
     */
    public function setUseIpv6($UseIpv6)
    {
        $this->UseIpv6 = $UseIpv6;
        return $this;
    }

    /**
     * @return string
     */
    public function getMaxBoshInavtivityTime()
    {
        return $this->MaxBoshInavtivityTime;
    }

    /**
     * @param string $MaxBoshInavtivityTime
     * @return $this
     */
    public function setMaxBoshInavtivityTime($MaxBoshInavtivityTime)
    {
        $this->MaxBoshInavtivityTime = $MaxBoshInavtivityTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getServerAdmins()
    {
        return $this->ServerAdmins;
    }

    /**
     * @param string $ServerAdmins
     * @return $this
     */
    public function setServerAdmins($ServerAdmins)
    {
        $this->ServerAdmins = $ServerAdmins;
        return $this;
    }

    /**
     * @return string
     */
    public function getServerWideEnabledPlugins()
    {
        return $this->ServerWideEnabledPlugins;
    }

    /**
     * @param string $ServerWideEnabledPlugins
     * @return $this
     */
    public function setServerWideEnabledPlugins($ServerWideEnabledPlugins)
    {
        $this->ServerWideEnabledPlugins = $ServerWideEnabledPlugins;
        return $this;
    }

    /**
     * @return string
     */
    public function getHttpPort()
    {
        return $this->HttpPort;
    }

    /**
     * @param string $HttpPort
     * @return $this
     */
    public function setHttpPort($HttpPort)
    {
        $this->HttpPort = $HttpPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getHttpsPort()
    {
        return $this->HttpsPort;
    }

    /**
     * @param string $HttpsPort
     * @return $this
     */
    public function setHttpsPort($HttpsPort)
    {
        $this->HttpsPort = $HttpsPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getPasteBinPort()
    {
        return $this->PasteBinPort;
    }

    /**
     * @param string $PasteBinPort
     * @return $this
     */
    public function setPasteBinPort($PasteBinPort)
    {
        $this->PasteBinPort = $PasteBinPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getBoshPort()
    {
        return $this->BoshPort;
    }

    /**
     * @param string $BoshPort
     * @return $this
     */
    public function setBoshPort($BoshPort)
    {
        $this->BoshPort = $BoshPort;
        return $this;
    }
}