<?php

namespace Mjr\Library\EntitiesBundle\Entity\openVZ;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="openvz_ostemplate")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\openVZ
 * @author Chris Westerfield <chris@mjr.one>
 */
class osTemplate
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use LogableTrait;
    use ServerTrait;
    use ActiveTrait;
    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\openVZ\Vm", mappedBy="OsTemplate", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $Vms;
    /**
     * @ORM\Column(name="all_servers", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $AllServers;
    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Description;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="file", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $File;

    /**
     * osTemplate constructor.
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
     * @return boolean
     */
    public function isAllServers()
    {
        return $this->AllServers;
    }

    /**
     * @param boolean $AllServers
     * @return $this
     */
    public function setAllServers($AllServers)
    {
        $this->AllServers = $AllServers;
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
    public function getFile()
    {
        return $this->File;
    }

    /**
     * @param string $File
     * @return $this
     */
    public function setFile($File)
    {
        $this->File = $File;
        return $this;
    }

}