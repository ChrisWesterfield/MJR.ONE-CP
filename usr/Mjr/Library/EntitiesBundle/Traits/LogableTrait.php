<?php

    namespace Mjr\Library\EntitiesBundle\Traits;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Entities\User\User;

    /**
     * Class LogableTrait
     *
     * @package Mjr\Library\EntitiesBundle\Traits
     * @trait
     * @package OmegaDev\LibraryBundle\Entity
     * @author Chris Westerfield <westerfield.chris@gmail.com>
     */
    trait LogableTrait
    {

        /**
         * @var User
         * @Gedmo\Blameable(on="create")
         * @ORM\ManyToOne(targetEntity="OmegaDev\LibraryBundle\Entity\User")
         * @ORM\JoinColumn(name="log_created_by", referencedColumnName="id")
         */
        protected $CreatedBy;

        /**
         * @var User
         * @Gedmo\Blameable(on="update")
         * @ORM\ManyToOne(targetEntity="OmegaDev\LibraryBundle\Entity\User")
         * @ORM\JoinColumn(name="log_updated_by", referencedColumnName="id")
         */
        protected $UpdatedBy;
        /**
         * @Gedmo\Timestampable(on="create")
         * @ORM\Column(name="created", type="datetime")
         * @var \DateTime
         */
        protected $created;

        /**
         * @Gedmo\Timestampable(on="create")
         * @ORM\Column(name="updated", type="datetime")
         * @var \DateTime
         */
        protected $updated;

        /**
         * @return User
         */
        public function getCreatedBy ()
        {
            return $this->CreatedBy;
        }

        /**
         * @param User $CreatedBy
         *
         * @return $this
         */
        public function setCreatedBy (User $CreatedBy )
        {
            $this->CreatedBy = $CreatedBy;
            return $this;
        }

        /**
         * @return User
         */
        public function getUpdatedBy ()
        {
            return $this->UpdatedBy;
        }

        /**
         * @param User $UpdatedBy
         *
         * @return $this
         */
        public function setUpdatedBy (User $UpdatedBy )
        {
            $this->UpdatedBy = $UpdatedBy;
            return $this;
        }


    }