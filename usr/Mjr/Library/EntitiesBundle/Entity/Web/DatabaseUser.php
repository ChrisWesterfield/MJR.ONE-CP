<?php

namespace Mjr\Library\EntitiesBundle\Entity\Web;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="web_database_user")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Web
 * @author Chris Westerfield <chris@mjr.one>
 */
class DatabaseUser
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ActiveTrait;
    use ServerTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="parent_domain_id", referencedColumnName="id")
     * @var WebDomain
     */
    protected $ParentDomain;
    /**
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Username;
    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Password;
    /**
     * @ORM\Column(name="prefix", type="string", length=64, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Prefix;
    /**
     * @ORM\Column(name="password_mongo", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $PasswordMongo;
    /**
     * @ORM\Column(name="read_only", type="boolean", nullable=false, options={"default"=false})
     * @var string
     * @Gedmo\Versioned
     */
    protected $ReadOnly;

    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\Database", mappedBy="Users", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $Databases;

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
     * DatabaseUSer constructor.
     */
    public function __construct()
    {
        $this->Databases = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getDatabases()
    {
        return $this->Databases;
    }

    /**
     * @param Database $database
     * @return bool
     */
    public function hasDatabase(Database $database)
    {
        return $this->Databases->contains($database);
    }

    /**
     * @param Database $database
     * @return $this
     */
    public function addDatabase(Database $database)
    {
        if(!$this->hasDatabase($database))
        {
            $this->Databases->add($database);
        }
        return $this;
    }

    /**
     * @param Database $database
     * @return $this
     */
    public function Database(Database $database)
    {
        if($this->hasDatabase($database))
        {
            $this->Databases->removeElement($database);
        }
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
    public function getPasswordMongo()
    {
        return $this->PasswordMongo;
    }

    /**
     * @param string $PasswordMongo
     * @return $this
     */
    public function setPasswordMongo($PasswordMongo)
    {
        $this->PasswordMongo = $PasswordMongo;
        return $this;
    }

    /**
     * @return string
     */
    public function getReadOnly()
    {
        return $this->ReadOnly;
    }

    /**
     * @param string $ReadOnly
     * @return $this
     */
    public function setReadOnly($ReadOnly)
    {
        $this->ReadOnly = $ReadOnly;
        return $this;
    }
}