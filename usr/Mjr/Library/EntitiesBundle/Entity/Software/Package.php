<?php

namespace Mjr\Library\EntitiesBundle\Entity\Software;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="software_package")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Software
 * @author Chris Westerfield <chris@mjr.one>
 */
class Package
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Title;
    /**
     * @ORM\Column(name="description", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Description;
    /**
     * @ORM\Column(name="version", type="string", length=8, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Version;
    /**
     * @ORM\Column(name="type", type="string", length=255, nullable=false, options={"default"="app"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;
    /**
     * @ORM\Column(name="installable", type="string", length=255, nullable=false, options={"default"="yes"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $Installable;
    /**
     * @ORM\Column(name="requires_db", type="boolean", nullable=false, options={"default"=false})
     * @var string
     * @Gedmo\Versioned
     */
    protected $RequiresDb;
    /**
     * @ORM\Column(name="remote_functions", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $RemoteFunctions;
    /**
     * @ORM\Column(name="key", type="string", length=255, nullable=false, unique=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Key;
    /**
     * @ORM\Column(name="config", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Config;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Software\Repository", inversedBy="Packages", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="repository_id", referencedColumnName="id")
     * @var Repository;
     */
    protected $Repository;

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
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param string $Title
     * @return $this
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
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
    public function getVersion()
    {
        return $this->Version;
    }

    /**
     * @param string $Version
     * @return $this
     */
    public function setVersion($Version)
    {
        $this->Version = $Version;
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
     * @return string
     */
    public function getInstallable()
    {
        return $this->Installable;
    }

    /**
     * @param string $Installable
     * @return $this
     */
    public function setInstallable($Installable)
    {
        $this->Installable = $Installable;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequiresDb()
    {
        return $this->RequiresDb;
    }

    /**
     * @param string $RequiresDb
     * @return $this
     */
    public function setRequiresDb($RequiresDb)
    {
        $this->RequiresDb = $RequiresDb;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteFunctions()
    {
        return $this->RemoteFunctions;
    }

    /**
     * @param string $RemoteFunctions
     * @return $this
     */
    public function setRemoteFunctions($RemoteFunctions)
    {
        $this->RemoteFunctions = $RemoteFunctions;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->Key;
    }

    /**
     * @param string $Key
     * @return $this
     */
    public function setKey($Key)
    {
        $this->Key = $Key;
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
     * @return Repository
     */
    public function getRepository()
    {
        return $this->Repository;
    }

    /**
     * @param Repository $Repository
     * @return $this
     */
    public function setRepository($Repository)
    {
        $this->Repository = $Repository;
        return $this;
    }
}