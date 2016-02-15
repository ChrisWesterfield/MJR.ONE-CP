<?php

namespace Mjr\Library\EntitiesBundle\Entity\Aps;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="aps_packages")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Aps
 * @author Chris Westerfield <chris@mjr.one>
 */
class Packages
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     * @Gedmo\Versioned
     * @var string
     */
    protected $Path;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Gedmo\Versioned
     * @var string
     */
    protected $Name;
    /**
     * @ORM\Column(name="category", type="string", length=255, nullable=false)
     * @Gedmo\Versioned
     * @var string
     */
    protected $Category;
    /**
     * @ORM\Column(name="version", type="string", length=20, nullable=false)
     * @Gedmo\Versioned
     * @var string
     */
    protected $Version;
    /**
     * @ORM\Column(name="release", type="integer", nullable=false, options={"default"=0})
     * @var string
     * @Gedmo\Versioned
     */
    protected $Release;
    /**
     * @ORM\Column(name="package_url", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $PackageUrl;
    /**
     * @ORM\Column(name="package_status", type="integer", nullable=false, options={"default"=0})
     * @var string
     * @Gedmo\Versioned
     */
    protected $PackageStatus;

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->Path;
    }

    /**
     * @param string $Path
     * @return $this
     */
    public function setPath($Path)
    {
        $this->Path = $Path;
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
    public function getCategory()
    {
        return $this->Category;
    }

    /**
     * @param string $Category
     * @return $this
     */
    public function setCategory($Category)
    {
        $this->Category = $Category;
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
    public function getRelease()
    {
        return $this->Release;
    }

    /**
     * @param string $Release
     * @return $this
     */
    public function setRelease($Release)
    {
        $this->Release = $Release;
        return $this;
    }

    /**
     * @return string
     */
    public function getPackageUrl()
    {
        return $this->PackageUrl;
    }

    /**
     * @param string $PackageUrl
     * @return $this
     */
    public function setPackageUrl($PackageUrl)
    {
        $this->PackageUrl = $PackageUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getPackageStatus()
    {
        return $this->PackageStatus;
    }

    /**
     * @param string $PackageStatus
     * @return $this
     */
    public function setPackageStatus($PackageStatus)
    {
        $this->PackageStatus = $PackageStatus;
        return $this;
    }
}