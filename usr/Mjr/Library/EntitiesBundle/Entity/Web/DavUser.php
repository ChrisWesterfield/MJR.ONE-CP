<?php

namespace Mjr\Library\EntitiesBundle\Entity\Web;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="web_dav_user")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Web
 * @author Chris Westerfield <chris@mjr.one>
 */
class DavUser
{
    use IdTrait;
    use ServerTrait;
    use SystemUserTrait;
    use SystemGroupTrait;
    use ActiveTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="parent_domain_id", referencedColumnName="id")
     * @var WebDomain
     */
    protected $ParentDomain;
    /**
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Username;
    /**
     * @ORM\Column(name="prefix", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Prefix;
    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Password;
    /**
     * @ORM\Column(name="dir", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Dir;

    /**
     * @return WebDomain
     */
    public function getParentDomain()
    {
        return $this->ParentDomain;
    }

    /**
     * @param WebDomain $ParentDomain
     * @return $this
     */
    public function setParentDomain(WebDomain $ParentDomain)
    {
        $this->ParentDomain = $ParentDomain;
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
    public function getPrefix()
    {
        return $this->Prefix;
    }

    /**
     * @param string $Prefix
     * @return $this
     */
    public function setPrefix($Prefix)
    {
        $this->Prefix = $Prefix;
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
     * @return string
     */
    public function getDir()
    {
        return $this->Dir;
    }

    /**
     * @param string $Dir
     * @return $this
     */
    public function setDir($Dir)
    {
        $this->Dir = $Dir;
        return $this;
    }
}