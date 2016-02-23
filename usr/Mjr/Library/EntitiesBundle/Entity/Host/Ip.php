<?php


    namespace Mjr\Library\EntitiesBundle\Entity\Host;

    use Doctrine\Common\Collections\ArrayCollection;
    use Mjr\Library\EntitiesBundle\Entity\Web\WebDomain;
    use Mjr\Library\EntitiesBundle\Traits\CustomerTrait;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;


    /**
     * @ORM\Table(name="host_ip")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\Host
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Ip
    {
        use IdTrait;
        use SystemGroupTrait;
        use SystemUserTrait;
        use CustomerTrait;
        use LogableTrait;
        use ServerTrait;
        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", mappedBy="IpV4Address", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $SitesV4;
        /**
         * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", mappedBy="IpV6Address", fetch="EXTRA_LAZY")
         * @var ArrayCollection
         */
        protected $SitesV6;
        /**
         * @ORM\Column(name="type", type="string", length=20, options={"default"="IPv4"})
         * @var string
         * @Gedmo\Versioned
         */
        protected $type;
        /**
         * @ORM\Column(name="address", type="string", length=80, nullable=false)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Address;
        /**
         * @ORM\Column(name="virtual_host", type="boolean", nullable=false, options={"default"=true})
         * @var boolean
         * @Gedmo\Versioned
         */
        protected $VirtualHost;
        /**
         * @ORM\Column(name="ports", type="string", length=100, options={"default"="80,443"})
         * @var string
         * @Gedmo\Versioned
         */
        protected $Ports;

        /**
         * @return string
         */
        public function getType()
        {
            return $this->type;
        }

        /**
         * @param string $type
         * @return $this
         */
        public function setType($type)
        {
            $this->type = $type;
            return $this;
        }

        /**
         * @return string
         */
        public function getAddress()
        {
            return $this->Address;
        }

        /**
         * @param string $Address
         * @return $this
         */
        public function setAddress($Address)
        {
            $this->Address = $Address;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isVirtualHost()
        {
            return $this->VirtualHost;
        }

        /**
         * @param boolean $VirtualHost
         * @return $this
         */
        public function setVirtualHost($VirtualHost)
        {
            $this->VirtualHost = $VirtualHost;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getPorts()
        {
            return $this->Ports;
        }

        /**
         * @param mixed $Ports
         * @return $this
         */
        public function setPorts($Ports)
        {
            $this->Ports = $Ports;
            return $this;
        }

        /**
         * @return ArrayCollection
         */
        public function getSitesV4()
        {
            return $this->SitesV4;
        }

        /**
         * @return ArrayCollection
         */
        public function getSitesV6()
        {
            return $this->SitesV6;
        }

        /**
         * @param WebDomain $site
         * @return bool
         */
        public function hasSiteV4(WebDomain $site)
        {
            return $this->SitesV4->contains($site);
        }

        /**
         * @param WebDomain $site
         * @return $this
         */
        public function addSiteV4(WebDomain $site)
        {
            if(!$this->hasSiteV4($site))
            {
                $this->SitesV4->add($site);
            }
            return $this;
        }

        /**
         * @param WebDomain $site
         * @return $this
         */
        public function removeSiteV4(WebDomain $site)
        {
            if($this->hasSiteV4($site))
            {
                $this->SitesV4->removeElement($site);
            }
            return $this;
        }

        /**
         * @param WebDomain $site
         * @return bool
         */
        public function hasSiteV6(WebDomain $site)
        {
            return $this->SitesV6->contains($site);
        }

        /**
         * @param WebDomain $site
         * @return $this
         */
        public function addSiteV6(WebDomain $site)
        {
            if(!$this->hasSiteV6($site))
            {
                $this->SitesV6->add($site);
            }
            return $this;
        }

        /**
         * @param WebDomain $site
         * @return $this
         */
        public function removeSiteV6(WebDomain $site)
        {
            if($this->hasSiteV6($site))
            {
                $this->SitesV6->removeElement($site);
            }
            return $this;
        }
    }