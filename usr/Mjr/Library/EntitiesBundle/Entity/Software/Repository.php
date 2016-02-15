<?php

namespace Mjr\Library\EntitiesBundle\Entity\Software;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="software_repository")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Software
 * @author Chris Westerfield <chris@mjr.one>
 */
class Repository
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ActiveTrait;
    use LogableTrait;
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
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Username;
    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @var string
     */
    protected $Password;

    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Software\Package", mappedBy="Repository", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $Packages;

    public function __construct()
    {
        $this->Packages = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getPackages()
    {
        return $this->Packages;
    }

    /**
     * @param Package $package
     * @return bool
     */
    public function hasPackage(Package $package)
    {
        return $this->Packages->contains($package);
    }

    /**
     * @param Package $package
     * @return $this
     */
    public function Package(Package $package)
    {
        if(!$this->hasPackage($package))
        {
            $this->Packages->add($package);
        }
        return $this;
    }

    /**
     * @param Package $package
     * @return $this
     */
    public function removePackage(Package $package)
    {
        if($this->hasPackage($package))
        {
            $this->Packages->removeElement($package);
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
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * @param string $Username
     * @return $this
     */
    public function setUsername($Username)
    {
        $this->Username = $Username;
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

}