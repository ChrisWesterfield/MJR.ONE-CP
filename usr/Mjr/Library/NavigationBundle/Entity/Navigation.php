<?php


    namespace Mjr\Library\NavigationBundle\Entity;
    use Mjr\Library\EntitiesBundle\Traits\serializeTrait;
    use Mjr\Library\EntitiesBundle\Traits\SoftDeletable;
    use Mjr\Library\EntitiesBundle\Traits\SortableTrait;
    use Mjr\Library\EntitiesBundle\Traits\TreeTrait;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Gedmo\Translatable\Translatable;

    /**
     * @ORM\Table(name="system_navigation")
     * @ORM\Entity(repositoryClass="Mjr\Library\NavigationBundle\Entity\TreeRepository")
     * @Gedmo\Loggable
     * @Gedmo\Tree(type="nested")
     * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
     * @package Mjr\Library\NavigationBundle\Entity
     * @author Chris Westerfield <westerfield.chris@gmail.com>
     */
    class Navigation
    {
        use TreeTrait;
        use SortableTrait;
        use serializeTrait;
        use SoftDeletable;
        /**
         * @ORM\Id
         * @ORM\Column(type="integer", nullable=false)
         * @ORM\GeneratedValue(strategy="IDENTITY")
         * @var integer
         */
        protected $Id;
        /**
         * @Gedmo\Translatable
         * @ORM\Column(name="title", type="string", length=250)
         * @var string
         */
        protected $title;

        /**
         * @ORM\Column(name="role", type="text", nullable=false)
         * @var string
         */
        protected $role;

        /**
         * @ORM\Column(name="link", type="string", length=250)
         * @var string
         */
        protected $link;

        /**
         * @Gedmo\Locale
         * Used locale to override Translation listener`s locale
         * this is not a mapped field of entity metadata, just a simple property
         */
        protected $locale;
        /**
         * @Gedmo\TreeParent
         * @ORM\ManyToOne(targetEntity="Mjr\Library\NavigationBundle\Entity\Navigation", inversedBy="children")
         * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
         */
        protected $parent;

        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\NavigationBundle\Entity\Navigation", mappedBy="parent")
         */
        protected $children;

        /**
         * @Gedmo\Translatable
         * @Gedmo\Slug
         * @ORM\Column(name="slug", type="string", length=128)
         */
        protected $slug;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->Id;
        }

        /**
         * @param mixed $Id
         * @return $this
         */
        public function setId($Id)
        {
            $this->Id = $Id;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         * @return $this
         */
        public function setTitle($title)
        {
            $this->title = $title;
            return $this;
        }

        /**
         * @return string
         */
        public function getRole()
        {
            return $this->role;
        }

        /**
         * @param string $role
         * @return $this
         */
        public function setRole($role)
        {
            $this->role = $role;
            return $this;
        }

        /**
         * @return string
         */
        public function getLink()
        {
            return $this->link;
        }

        /**
         * @param string $link
         * @return $this
         */
        public function setLink($link)
        {
            $this->link = $link;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getLocale()
        {
            return $this->locale;
        }

        /**
         * @param mixed $locale
         * @return $this
         */
        public function setLocale($locale)
        {
            $this->locale = $locale;
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

        /**
         * @return mixed
         */
        public function getSlug()
        {
            return $this->slug;
        }

        /**
         * @param mixed $slug
         * @return $this
         */
        public function setSlug($slug)
        {
            $this->slug = $slug;
            return $this;
        }
    }