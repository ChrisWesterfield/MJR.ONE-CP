<?php


    namespace Mjr\Library\EntitiesBundle\Traits;
    use DateTime;

    /**
     * Class SoftDeletable
     *
     * @package Mjr\Library\EntitiesBundle\Traits
     */
    trait SoftDeletable
    {

        /**
         * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
         * @var DateTime
         */
        protected $deletedAt;

        /**
         * @return DateTime
         */
        public function getDeletedAt()
        {
            return $this->deletedAt;
        }

        /**
         * @param DateTime $time
         *
         * @return $this
         */
        public function setDeletedAt(DateTime $time=null)
        {
            $this->deletedAt = $time;
            return $this;
        }

        /**
         * @return $this
         */
        public function unDelete()
        {
            $this->deletedAt = null;
            return $this;
        }

        /**
         * @return bool
         */
        public function isSoftDeleted()
        {
            return $this->deletedAt!==null;
        }

    }