<?php

    namespace Mjr\Library\EntitiesBundle\Traits;

    use Gedmo\Mapping\Annotation as Gedmo;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * Class SortableTrait
     *
     * @package Mjr\Library\EntitiesBundle\Traits
     * @trait
     * @author Chris Westerfield <chris@mjr.one>
     */
    trait SortableTrait
    {
        /**
         * @Gedmo\SortablePosition
         * @ORM\Column(name="sorting_position", type="integer", options={"default":0})
         */
        protected $SortingPosition;
        /**
         * @Gedmo\SortableGroup
         * @ORM\Column(name="sorting_category", type="string", length=128, options={"default": "default"})
         */
        protected $SortingCategory;

        /**
         * @return mixed
         */
        public function getSortingPosition ()
        {
            return $this->SortingPosition;
        }

        /**
         * @param mixed $SortingPosition
         * @return $this
         */
        public function setSortingPosition ( $SortingPosition )
        {
            $this->SortingPosition = $SortingPosition;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getSortingCategory ()
        {
            return $this->SortingCategory;
        }

        /**
         * @param mixed $SortingCategory
         * @return $this
         */
        public function setSortingCategory ( $SortingCategory )
        {
            $this->SortingCategory = $SortingCategory;
            return $this;
        }


    }