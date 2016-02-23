<?php

    namespace Mjr\Library\EntitiesBundle\Traits;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;

    /**
     * Class TreeTrait
     *
     * @package Mjr\Library\EntitiesBundle\Traits
     * @trait
     * @author Chris Westerfield <chris@mjr.one>
     */
    trait TreeTrait
    {

        /**
         * @Gedmo\TreeLeft
         * @ORM\Column(name="tree_left", type="integer")
         */
        protected $Left;

        /**
         * @Gedmo\TreeLevel
         * @ORM\Column(name="tree_level", type="integer")
         */
        protected $Level;

        /**
         * @Gedmo\TreeRight
         * @ORM\Column(name="tree_right", type="integer")
         */
        protected $Right;

        /**
         * @Gedmo\TreeRoot
         * @ORM\Column(name="tree_root", type="integer", nullable=true)
         */
        protected $Root;

        /**
         * @return mixed
         */
        public function getLeft ()
        {
            return $this->Left;
        }

        /**
         * @param mixed $Left
         * @return $this
         */
        public function setLeft ( $Left )
        {
            $this->Left = $Left;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getLevel ()
        {
            return $this->Level;
        }

        /**
         * @param mixed $Level
         * @return $this
         */
        public function setLevel ( $Level )
        {
            $this->Level = $Level;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getRight ()
        {
            return $this->Right;
        }

        /**
         * @param mixed $Right
         * @return $this
         */
        public function setRight ( $Right )
        {
            $this->Right = $Right;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getRoot ()
        {
            return $this->Root;
        }

        /**
         * @param mixed $Root
         * @return $this
         */
        public function setRoot ( $Root )
        {
            $this->Root = $Root;
            return $this;
        }

    }