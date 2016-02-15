<?php

namespace Mjr\Library\EntitiesBundle\Entity\openVZ;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="openvz_vm")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\openVZ
 * @author Chris Westerfield <chris@mjr.one>
 */
class Vm
{
    use IdTrait;
    use SystemUserTrait;
    use SystemGroupTrait;
    use ServerTrait;
    use ActiveTrait;
    /**
     * @ORM\Column(name="veid", type="integer", nullable=false, unique=true)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Veid;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\openVZ\Template", inversedBy="Vms", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="template_id", referencedColumnName="id")
     * @var Template;
     */
    protected $Template;
    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\openVZ\Ip", mappedBy="Vms", fetch="EXTRA_LAZY")
     * @var ArrayCollection;
     */
    protected $Ips;
    /**
     * @ORM\Column(name="hostname", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Hostname;
    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @var string
     */
    protected $Password;
    /**
     * @ORM\Column(name="start_boot", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $StartBoot;
    /**
     * @ORM\Column(name="active_until_date", type="datetime", nullable=true)
     * @var \DateTime
     * @Gedmo\Versioned
     */
    protected $ActiveUntilDate;
    /**
     * @ORM\Column(name="description", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Description;
    /**
     * @ORM\Column(name="disk_space", type="integer", nullable=false, options={"default"=0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $DiskSpace;
    /**
     * @ORM\Column(name="traffic", type="integer", nullable=false, options={"default"=-1})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Traffic;
    /**
     * @ORM\Column(name="bandwith", type="integer", nullable=false, options={"default"=-1})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Bandwith;
    /**
     * @ORM\Column(name="ram", type="integer", nullable=false, options={"default"=0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Ram;
    /**
     * @ORM\Column(name="ram_burst", type="integer", nullable=false, options={"default"=0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $RamBurst;
    /**
     * @ORM\Column(name="cpu_units", type="integer", nullable=false, options={"default"=1000})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $CpuUnits;
    /**
     * @ORM\Column(name="cpu_num", type="integer", nullable=false, options={"default"=4})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $CpuNum;
    /**
     * @ORM\Column(name="cpu_limit", type="integer", nullable=false, options={"default"=400})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $CpuLimit;
    /**
     * @ORM\Column(name="io_priority", type="integer", nullable=false, options={"default"=4})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $IoPriority;
    /**
     * @ORM\Column(name="name_server", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NameServer;
    /**
     * @ORM\Column(name="capability", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Capability;
    /**
     * @ORM\Column(name="features", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Features;
    /**
     * @ORM\Column(name="ip_tables", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $IpTables;
    /**
     * @ORM\Column(name="config", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Config;
    /**
     * @ORM\Column(name="custom", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Custom;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\openVZ\osTemplate", inversedBy="Vms", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="os_template_id", referencedColumnName="id")
     * @var osTemplate;
     */
    protected $OsTemplate;
    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\openVZ\Traffic", mappedBy="Veid", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $Traffics;

    /**
     * Vm constructor.
     */
    public function __construct()
    {
        $this->Traffics = new ArrayCollection();
        $this->Ips = new ArrayCollection();
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
     * @return int
     */
    public function getVeid()
    {
        return $this->Veid;
    }

    /**
     * @param int $Veid
     * @return $this
     */
    public function setVeid($Veid)
    {
        $this->Veid = $Veid;
        return $this;
    }

    /**
     * @return Template
     */
    public function getTemplate()
    {
        return $this->Template;
    }

    /**
     * @param Template $Template
     * @return $this
     */
    public function setTemplate($Template)
    {
        $this->Template = $Template;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getIps()
    {
        return $this->Ips;
    }

    /**
     * @param Ip $Ip
     * @return bool
     */
    public function hasIp(Ip $Ip)
    {
        return $this->Ips->contains($Ip);
    }

    /**
     * @param Ip $ip
     * @return $this
     */
    public function addIp(Ip $ip)
    {
        if(!$this->hasIp($ip))
        {
            $this->Ips->add($ip);
        }
        return $this;
    }

    /**
     * @param Ip $ip
     * @return $this
     */
    public function removeIp(Ip $ip)
    {
        if($this->hasIp($ip))
        {
            $this->Ips->removeElement($ip);
        }
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
     * @return boolean
     */
    public function isStartBoot()
    {
        return $this->StartBoot;
    }

    /**
     * @param boolean $StartBoot
     * @return $this
     */
    public function setStartBoot($StartBoot)
    {
        $this->StartBoot = $StartBoot;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getActiveUntilDate()
    {
        return $this->ActiveUntilDate;
    }

    /**
     * @param \DateTime $ActiveUntilDate
     * @return $this
     */
    public function setActiveUntilDate($ActiveUntilDate)
    {
        $this->ActiveUntilDate = $ActiveUntilDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     * @return $this
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiskSpace()
    {
        return $this->DiskSpace;
    }

    /**
     * @param int $DiskSpace
     * @return $this
     */
    public function setDiskSpace($DiskSpace)
    {
        $this->DiskSpace = $DiskSpace;
        return $this;
    }

    /**
     * @return int
     */
    public function getTraffic()
    {
        return $this->Traffic;
    }

    /**
     * @param int $Traffic
     * @return $this
     */
    public function setTraffic($Traffic)
    {
        $this->Traffic = $Traffic;
        return $this;
    }

    /**
     * @return int
     */
    public function getBandwith()
    {
        return $this->Bandwith;
    }

    /**
     * @param int $Bandwith
     * @return $this
     */
    public function setBandwith($Bandwith)
    {
        $this->Bandwith = $Bandwith;
        return $this;
    }

    /**
     * @return int
     */
    public function getRam()
    {
        return $this->Ram;
    }

    /**
     * @param int $Ram
     * @return $this
     */
    public function setRam($Ram)
    {
        $this->Ram = $Ram;
        return $this;
    }

    /**
     * @return int
     */
    public function getRamBurst()
    {
        return $this->RamBurst;
    }

    /**
     * @param int $RamBurst
     * @return $this
     */
    public function setRamBurst($RamBurst)
    {
        $this->RamBurst = $RamBurst;
        return $this;
    }

    /**
     * @return int
     */
    public function getCpuUnits()
    {
        return $this->CpuUnits;
    }

    /**
     * @param int $CpuUnits
     * @return $this
     */
    public function setCpuUnits($CpuUnits)
    {
        $this->CpuUnits = $CpuUnits;
        return $this;
    }

    /**
     * @return int
     */
    public function getCpuNum()
    {
        return $this->CpuNum;
    }

    /**
     * @param int $CpuNum
     * @return $this
     */
    public function setCpuNum($CpuNum)
    {
        $this->CpuNum = $CpuNum;
        return $this;
    }

    /**
     * @return int
     */
    public function getCpuLimit()
    {
        return $this->CpuLimit;
    }

    /**
     * @param int $CpuLimit
     * @return $this
     */
    public function setCpuLimit($CpuLimit)
    {
        $this->CpuLimit = $CpuLimit;
        return $this;
    }

    /**
     * @return int
     */
    public function getIoPriority()
    {
        return $this->IoPriority;
    }

    /**
     * @param int $IoPriority
     * @return $this
     */
    public function setIoPriority($IoPriority)
    {
        $this->IoPriority = $IoPriority;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameServer()
    {
        return $this->NameServer;
    }

    /**
     * @param string $NameServer
     * @return $this
     */
    public function setNameServer($NameServer)
    {
        $this->NameServer = $NameServer;
        return $this;
    }

    /**
     * @return string
     */
    public function getCapability()
    {
        return $this->Capability;
    }

    /**
     * @param string $Capability
     * @return $this
     */
    public function setCapability($Capability)
    {
        $this->Capability = $Capability;
        return $this;
    }

    /**
     * @return string
     */
    public function getFeatures()
    {
        return $this->Features;
    }

    /**
     * @param string $Features
     * @return $this
     */
    public function setFeatures($Features)
    {
        $this->Features = $Features;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpTables()
    {
        return $this->IpTables;
    }

    /**
     * @param string $IpTables
     * @return $this
     */
    public function setIpTables($IpTables)
    {
        $this->IpTables = $IpTables;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfig()
    {
        return $this->Config;
    }

    /**
     * @param string $Config
     * @return $this
     */
    public function setConfig($Config)
    {
        $this->Config = $Config;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustom()
    {
        return $this->Custom;
    }

    /**
     * @param string $Custom
     * @return $this
     */
    public function setCustom($Custom)
    {
        $this->Custom = $Custom;
        return $this;
    }

    /**
     * @return osTemplate
     */
    public function getOsTemplate()
    {
        return $this->OsTemplate;
    }

    /**
     * @param osTemplate $OsTemplate
     * @return $this
     */
    public function setOsTemplate($OsTemplate)
    {
        $this->OsTemplate = $OsTemplate;
        return $this;
    }


}