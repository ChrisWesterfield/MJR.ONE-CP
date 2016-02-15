<?php

    namespace Mjr\Library\EntitiesBundle\Entity;

    use Doctrine\Common\Collections\ArrayCollection;
    use Mjr\Library\EntitiesBundle\Entity\Web\WebDomain;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Entity\Mail\Domain as MailDomain;

    /**
     * @ORM\Table(name="domain")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Domain
    {
        use IdTrait;
        use SystemGroupTrait;
        use SystemUserTrait;
        use LogableTrait;
        /**
         * @ORM\Column(name="domain", type="string", length=255,nullable=false)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Domain;

        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Domain", mappedBy="Domain", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $MailDomains;

        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", mappedBy="Domain", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $WebDomains;

        /**
         * Domain constructor.
         */
        public function __construct()
        {
            $this->MailDomain = new ArrayCollection();
            $this->WebDomains = new ArrayCollection();
        }

        /**
         * @return ArrayCollection
         */
        public function getMailDomains()
        {
            return $this->MailDomains;
        }

        /**
         * @param MailDomain $MailDomain
         * @return bool
         */
        public function hasMailDomain(MailDomain $MailDomain)
        {
            return $this->MailDomains->contains($MailDomain);
        }

        /**
         * @param MailDomain $MailDomain
         * @return $this
         */
        public function addMailDomain(MailDomain $MailDomain)
        {
            if(!$this->hasMailDomain($MailDomain))
            {
                $this->MailDomains->add($MailDomain);
            }
            return $this;
        }

        /**
         * @param MailDomain $MailDomain
         * @return $this
         */
        public function removeMailDomain(MailDomain $MailDomain)
        {
            if($this->hasMailDomain($MailDomain))
            {
                $this->MailDomains->removeElement($MailDomain);
            }
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getWebDomains()
        {
            return $this->WebDomains;
        }

        /**
         * @param WebDomain $WebDomain
         * @return bool
         */
        public function hasWebDomain(WebDomain $WebDomain)
        {
            return $this->WebDomains->contains($WebDomain);
        }

        /**
         * @param WebDomain $WebDomain $WebDomain
         * @return $this
         */
        public function addWebDomain(WebDomain $WebDomain)
        {
            if(!$this->hasWebDomain($WebDomain))
            {
                $this->WebDomains->add($WebDomain);
            }
            return $this;
        }

        /**
         * @param WebDomain $WebDomain
         * @return $this
         */
        public function removeWebDomain(WebDomain $WebDomain)
        {
            if($this->hasWebDomain($WebDomain))
            {
                $this->WebDomains->removeElement($WebDomain);
            }
            return $this;
        }

        /**
         * @return string
         */
        public function getDomain()
        {
            return $this->Domain;
        }

        /**
         * @param string $Domain
         * @return $this
         */
        public function setDomain($Domain)
        {
            $this->Domain = $Domain;
            return $this;
        }

    }