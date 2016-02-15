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
 * @ORM\Table(name="web_folder")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Web
 * @author Chris Westerfield <chris@mjr.one>
 */
class Folder
{
    use IdTrait;
    use ServerTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ActiveTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="parent_domain_id", referencedColumnName="id")
     * @var WebDomain
     */
    protected $ParentDomain;
    /**
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Path;
    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\FolderUser", mappedBy="Folder", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $Users;

    /**
     * @return ArrayCollection
     */
    public function getUsers()
    {
        return $this->Users;
    }

    /**
     * @param FolderUser $user
     * @return bool
     */
    public function hasUser(FolderUser $user)
    {
        return $this->Users->contains($user);
    }

    /**
     * @param FolderUser $user
     * @return $this
     */
    public function addUser(FolderUser $user)
    {
        if(!$this->hasUser($user))
        {
            $this->Users->add($user);
        }
        return $this;
    }

    /**
     * @param FolderUser $user
     * @return $this
     */
    public function removeUser(FolderUser $user)
    {
        if($this->hasUser($user))
        {
            $this->Users->removeElement($user);
        }
        return $this;
    }

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
}