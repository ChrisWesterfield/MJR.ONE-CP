<?php

namespace Mjr\Library\EntitiesBundle\Entity\openVZ;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="openvz_template")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\openVZ
 * @author Chris Westerfield <chris@mjr.one>
 */
class Template
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ActiveTrait;
    use LogableTrait;
    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\openVZ\Vm", mappedBy="Template", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $Vms;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="diskspace", type="integer", nullable=false, options={"default"=0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Diskspace;
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
     * @ORM\Column(name="cpu_limit", type="integer", nullable=false, options={"default"=400})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $CpuLimit;
    /**
     * @ORM\Column(name="cpu_num", type="integer", nullable=false, options={"default"=400})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $CpuNum;
    /**
     * @ORM\Column(name="io_priority", type="integer", nullable=false, options={"default"=4})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $IoPriority;
    /**
     * @ORM\Column(name="description", type="text", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Description;
    /**
     * @ORM\Column(name="num_proc", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NumProc;
    /**
     * @ORM\Column(name="num_tcp_sock", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NumTcpSock;
    /**
     * @ORM\Column(name="num_other_sock", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NumOtherSock;
    /**
     * @ORM\Column(name="vm_guarpages", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $VmGuarpages;
    /**
     * @ORM\Column(name="kmem_size", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $KMemSize;
    /**
     * @ORM\Column(name="tcp_snd_buf", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $TcpSndBuf;
    /**
     * @ORM\Column(name="tcp_recv_buf", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $TcpRecvBuf;
    /**
     * @ORM\Column(name="other_sock_buf", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $OtherSockBuf;
    /**
     * @ORM\Column(name="dgram_rcv_buf", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $DGramRcvBuf;
    /**
     * @ORM\Column(name="oom_guar_pages", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $OOmGuarPages;
    /**
     * @ORM\Column(name="priv_vmpages", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $PrivVMPages;
    /**
     * @ORM\Column(name="locked_pages", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $LockedPages;
    /**
     * @ORM\Column(name="shm_pages", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $ShmPages;
    /**
     * @ORM\Column(name="phys_pages", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $PhysPages;
    /**
     * @ORM\Column(name="num_files", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NumFiles;
    /**
     * @ORM\Column(name="av_num_proc", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $AvNumProc;
    /**
     * @ORM\Column(name="num_flock", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NumFLock;
    /**
     * @ORM\Column(name="numpty", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Numpty;
    /**
     * @ORM\Column(name="num_sig_info", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NumSigInfo;
    /**
     * @ORM\Column(name="dcache_size", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $DCacheSize;
    /**
     * @ORM\Column(name="num_ip_tent", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NumIpTent;
    /**
     * @ORM\Column(name="swap_pages", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SwapPages;
    /**
     * @ORM\Column(name="hostname", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Hostname;
    /**
     * @ORM\Column(name="name_server", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NameServer;
    /**
     * @ORM\Column(name="create_dns", type="boolean", length=255, nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $CreateDns;
    /**
     * @ORM\Column(name="capability", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Capability;
    /**
     * @ORM\Column(name="features", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Features;
    /**
     * @ORM\Column(name="ip_tables", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $IpTables;
    /**
     * @ORM\Column(name="custom", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Custom;

    /**
     * Template constructor.
     */
    public function __construct()
    {
        $this->Vms = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getVms()
    {
        return $this->Vms;
    }

    /**
     * @param Vm $vm
     * @return bool
     */
    public function hasVm(Vm $vm)
    {
        return $this->Vms->contains($vm);
    }

    /**
     * @param Vm $vm
     * @return $this
     */
    public function addVm(Vm $vm)
    {
        if(!$this->hasVm($vm))
        {
            $this->Vms->add($vm);
        }
        return $this;
    }

    /**
     * @param Vm $vm
     * @return $this
     */
    public function removeVm(Vm $vm)
    {
        if($this->hasVm($vm))
        {
            $this->Vms->removeElement($vm);
        }
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
     * @return int
     */
    public function getDiskspace()
    {
        return $this->Diskspace;
    }

    /**
     * @param int $Diskspace
     * @return $this
     */
    public function setDiskspace($Diskspace)
    {
        $this->Diskspace = $Diskspace;
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
     * @return string
     */
    public function getNumProc()
    {
        return $this->NumProc;
    }

    /**
     * @param string $NumProc
     * @return $this
     */
    public function setNumProc($NumProc)
    {
        $this->NumProc = $NumProc;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumTcpSock()
    {
        return $this->NumTcpSock;
    }

    /**
     * @param string $NumTcpSock
     * @return $this
     */
    public function setNumTcpSock($NumTcpSock)
    {
        $this->NumTcpSock = $NumTcpSock;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumOtherSock()
    {
        return $this->NumOtherSock;
    }

    /**
     * @param string $NumOtherSock
     * @return $this
     */
    public function setNumOtherSock($NumOtherSock)
    {
        $this->NumOtherSock = $NumOtherSock;
        return $this;
    }

    /**
     * @return string
     */
    public function getVmGuarpages()
    {
        return $this->VmGuarpages;
    }

    /**
     * @param string $VmGuarpages
     * @return $this
     */
    public function setVmGuarpages($VmGuarpages)
    {
        $this->VmGuarpages = $VmGuarpages;
        return $this;
    }

    /**
     * @return string
     */
    public function getKMemSize()
    {
        return $this->KMemSize;
    }

    /**
     * @param string $KMemSize
     * @return $this
     */
    public function setKMemSize($KMemSize)
    {
        $this->KMemSize = $KMemSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getTcpSndBuf()
    {
        return $this->TcpSndBuf;
    }

    /**
     * @param string $TcpSndBuf
     * @return $this
     */
    public function setTcpSndBuf($TcpSndBuf)
    {
        $this->TcpSndBuf = $TcpSndBuf;
        return $this;
    }

    /**
     * @return string
     */
    public function getTcpRecvBuf()
    {
        return $this->TcpRecvBuf;
    }

    /**
     * @param string $TcpRecvBuf
     * @return $this
     */
    public function setTcpRecvBuf($TcpRecvBuf)
    {
        $this->TcpRecvBuf = $TcpRecvBuf;
        return $this;
    }

    /**
     * @return string
     */
    public function getOtherSockBuf()
    {
        return $this->OtherSockBuf;
    }

    /**
     * @param string $OtherSockBuf
     * @return $this
     */
    public function setOtherSockBuf($OtherSockBuf)
    {
        $this->OtherSockBuf = $OtherSockBuf;
        return $this;
    }

    /**
     * @return string
     */
    public function getDGramRcvBuf()
    {
        return $this->DGramRcvBuf;
    }

    /**
     * @param string $DGramRcvBuf
     * @return $this
     */
    public function setDGramRcvBuf($DGramRcvBuf)
    {
        $this->DGramRcvBuf = $DGramRcvBuf;
        return $this;
    }

    /**
     * @return string
     */
    public function getOOmGuarPages()
    {
        return $this->OOmGuarPages;
    }

    /**
     * @param string $OOmGuarPages
     * @return $this
     */
    public function setOOmGuarPages($OOmGuarPages)
    {
        $this->OOmGuarPages = $OOmGuarPages;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivVMPages()
    {
        return $this->PrivVMPages;
    }

    /**
     * @param string $PrivVMPages
     * @return $this
     */
    public function setPrivVMPages($PrivVMPages)
    {
        $this->PrivVMPages = $PrivVMPages;
        return $this;
    }

    /**
     * @return string
     */
    public function getLockedPages()
    {
        return $this->LockedPages;
    }

    /**
     * @param string $LockedPages
     * @return $this
     */
    public function setLockedPages($LockedPages)
    {
        $this->LockedPages = $LockedPages;
        return $this;
    }

    /**
     * @return string
     */
    public function getShmPages()
    {
        return $this->ShmPages;
    }

    /**
     * @param string $ShmPages
     * @return $this
     */
    public function setShmPages($ShmPages)
    {
        $this->ShmPages = $ShmPages;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhysPages()
    {
        return $this->PhysPages;
    }

    /**
     * @param string $PhysPages
     * @return $this
     */
    public function setPhysPages($PhysPages)
    {
        $this->PhysPages = $PhysPages;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumFiles()
    {
        return $this->NumFiles;
    }

    /**
     * @param string $NumFiles
     * @return $this
     */
    public function setNumFiles($NumFiles)
    {
        $this->NumFiles = $NumFiles;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvNumProc()
    {
        return $this->AvNumProc;
    }

    /**
     * @param string $AvNumProc
     * @return $this
     */
    public function setAvNumProc($AvNumProc)
    {
        $this->AvNumProc = $AvNumProc;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumFLock()
    {
        return $this->NumFLock;
    }

    /**
     * @param string $NumFLock
     * @return $this
     */
    public function setNumFLock($NumFLock)
    {
        $this->NumFLock = $NumFLock;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumpty()
    {
        return $this->Numpty;
    }

    /**
     * @param string $Numpty
     * @return $this
     */
    public function setNumpty($Numpty)
    {
        $this->Numpty = $Numpty;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumSigInfo()
    {
        return $this->NumSigInfo;
    }

    /**
     * @param string $NumSigInfo
     * @return $this
     */
    public function setNumSigInfo($NumSigInfo)
    {
        $this->NumSigInfo = $NumSigInfo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDCacheSize()
    {
        return $this->DCacheSize;
    }

    /**
     * @param string $DCacheSize
     * @return $this
     */
    public function setDCacheSize($DCacheSize)
    {
        $this->DCacheSize = $DCacheSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumIpTent()
    {
        return $this->NumIpTent;
    }

    /**
     * @param string $NumIpTent
     * @return $this
     */
    public function setNumIpTent($NumIpTent)
    {
        $this->NumIpTent = $NumIpTent;
        return $this;
    }

    /**
     * @return string
     */
    public function getSwapPages()
    {
        return $this->SwapPages;
    }

    /**
     * @param string $SwapPages
     * @return $this
     */
    public function setSwapPages($SwapPages)
    {
        $this->SwapPages = $SwapPages;
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
     * @return boolean
     */
    public function isCreateDns()
    {
        return $this->CreateDns;
    }

    /**
     * @param boolean $CreateDns
     * @return $this
     */
    public function setCreateDns($CreateDns)
    {
        $this->CreateDns = $CreateDns;
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
}