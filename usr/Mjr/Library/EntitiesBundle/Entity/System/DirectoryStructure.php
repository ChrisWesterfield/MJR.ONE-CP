<?php


namespace Mjr\Library\EntitiesBundle\Entity\System;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\CustomerNullableTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\SortableTrait;
use Mjr\Library\EntitiesBundle\Traits\TreeTrait;


/**
 * @ORM\Table(name="system_directory_structure")
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\System
 * @author Chris Westerfield <chris@mjr.one>
 * @ORM\Entity(repositoryClass="\Mjr\Library\EntitiesBundle\Repository\System\DirectoryStructure")
 * @Gedmo\Loggable
 * @Gedmo\Tree(type="nested")
 */

class DirectoryStructure
{
    use IdTrait;
    use LogableTrait;
    use ActiveTrait;
    use TreeTrait;
    use SortableTrait;
    use CustomerNullableTrait;

    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\System\DirectoryStructure", inversedBy="children")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @var DirectoryStructure
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\System\DirectoryStructure", mappedBy="parent")
     * @ORM\OrderBy({"lft" = "ASC"})
     * @var ArrayCollection
     */
    protected $children;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false, options={"default"="#"})
     * @var string
     */
    protected $name;
    /**
     * @ORM\Column(name="function", type="string", length=255, nullable=false, options={"default"="#"})
     * @var string
     */
    protected $function;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * @param string $function
     * @return $this
     */
    public function setFunction($function)
    {
        $this->function = $function;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     * @return $this
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }
}