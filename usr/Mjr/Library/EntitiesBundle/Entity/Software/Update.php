<?php

namespace Mjr\Library\EntitiesBundle\Entity\Software;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="software_update")
 * @ORM\Entity()
 * @Gedmo\Loggable( )
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Software
 * @author Chris Westerfield <chris@mjr.one>
 */
class Update
{
    use IdTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Repository", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="repository_id", referencedColumnName="id")
     */
    protected $Repository;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Url;
    /**
     * @ORM\Column(name="md5", type="string", length=64, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Md5;
    /**
     * @ORM\Column(name="dependencies", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Dependencies;
    /**
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Title;
    /**
     * @ORM\Column(name="v1", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $v1;
    /**
     * @ORM\Column(name="v2", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $v2;
    /**
     * @ORM\Column(name="v3", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $v3;
    /**
     * @ORM\Column(name="v4", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $v4;
    /**
     * @ORM\Column(name="vmjr", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $vmjr;
    /**
     * @ORM\Column(name="type", type="string", length=16, nullable=false, options={"default"="full"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;

    /**
     * @return mixed
     */
    public function getRepository()
    {
        return $this->Repository;
    }

    /**
     * @param mixed $Repository
     * @return $this
     */
    public function setRepository($Repository)
    {
        $this->Repository = $Repository;
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
    public function getUrl()
    {
        return $this->Url;
    }

    /**
     * @param string $Url
     * @return $this
     */
    public function setUrl($Url)
    {
        $this->Url = $Url;
        return $this;
    }

    /**
     * @return string
     */
    public function getMd5()
    {
        return $this->Md5;
    }

    /**
     * @param string $Md5
     * @return $this
     */
    public function setMd5($Md5)
    {
        $this->Md5 = $Md5;
        return $this;
    }

    /**
     * @return string
     */
    public function getDependencies()
    {
        return $this->Dependencies;
    }

    /**
     * @param string $Dependencies
     * @return $this
     */
    public function setDependencies($Dependencies)
    {
        $this->Dependencies = $Dependencies;
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
     * @return boolean
     */
    public function isV1()
    {
        return $this->v1;
    }

    /**
     * @param boolean $v1
     * @return $this
     */
    public function setV1($v1)
    {
        $this->v1 = $v1;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isV2()
    {
        return $this->v2;
    }

    /**
     * @param boolean $v2
     * @return $this
     */
    public function setV2($v2)
    {
        $this->v2 = $v2;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isV3()
    {
        return $this->v3;
    }

    /**
     * @param boolean $v3
     * @return $this
     */
    public function setV3($v3)
    {
        $this->v3 = $v3;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isV4()
    {
        return $this->v4;
    }

    /**
     * @param boolean $v4
     * @return $this
     */
    public function setV4($v4)
    {
        $this->v4 = $v4;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isVmjr()
    {
        return $this->vmjr;
    }

    /**
     * @param boolean $vmjr
     * @return $this
     */
    public function setVmjr($vmjr)
    {
        $this->vmjr = $vmjr;
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
}