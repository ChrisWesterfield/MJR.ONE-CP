<?php

namespace Mjr\Library\EntitiesBundle\Entity\Web;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="folder_user")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Web
 * @author Chris Westerfield <chris@mjr.one>
 */
class FolderUser
{
    use SystemGroupTrait;
    use SystemUserTrait;
    use IdTrait;
    use ActiveTrait;
    use LogableTrait;
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
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Password;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\Folder", inversedBy="Users", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="folder_id", referencedColumnName="id")
     * @var Folder
     */
    protected $Folder;

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
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     * @return $this
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
        return $this;
    }

    /**
     * @return Folder
     */
    public function getFolder()
    {
        return $this->Folder;
    }

    /**
     * @param Folder $Folder
     * @return $this
     */
    public function setFolder($Folder)
    {
        $this->Folder = $Folder;
        return $this;
    }


}