<?php


namespace Mjr\Library\EntitiesBundle\Entity\CustomerTemplate;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;


/**
 * @ORM\Table(name="template_customer_dns")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\CustomerTemplate
 * @author Chris Westerfield <chris@mjr.one>
 */
class Dns
{
    use serializeTrait;
    use LogableTrait;
    use IdTrait;
    /**
     * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Main", inversedBy="Dns", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="Id")
     * @var Main
     */
    protected $Customer;
    /**
     * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="host_id", referencedColumnName="Id")
     * @var Main
     */
    protected $defaultHost;
    /**
     * @ORM\ManyToMany(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="template_customer_dns_host",
     *     joinColumns={
     *          @ORM\JoinColumn(name="host_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={@ORM\JoinColumn(name="website_id", referencedColumnName="id", unique=true)}
     * )
     * @var ArrayCollection
     */
    protected $hosts;
    /**
     * @ORM\Column(name="max_zones", type="integer", nullable=false, options={"default": 0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxZones;
    /**
     * @ORM\Column(name="max_dns_entries", type="integer", nullable=false, options={"default": 0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxDnsEntries;

    /**
     * Dns constructor.
     */
    public function __construct()
    {
        $this->hosts = new ArrayCollection();
    }

    /**
     * @param Main $main
     * @return $this
     */
    public function addHost(Main $main)
    {
        $this->hosts->add($main);
        return $this;
    }

    /**
     * @param Main $main
     * @return bool
     */
    public function hasHost(Main $main)
    {
        return $this->hosts->contains($main);
    }

    /**
     * @return ArrayCollection
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * @param Main $main
     * @return bool
     */
    public function removeHost(Main $main)
    {
        if ($this->hasHost($main))
        {
            $this->hosts->removeElement($main);
            return true;
        }
        return false;
    }

    /**
     * @return int
     */
    public function getMaxDnsEntries()
    {
        return $this->maxDnsEntries;
    }

    /**
     * @param int $maxDnsEntries
     * @return $this
     */
    public function setMaxDnsEntries($maxDnsEntries)
    {
        $this->maxDnsEntries = $maxDnsEntries;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxZones()
    {
        return $this->maxZones;
    }

    /**
     * @param int $maxZones
     * @return $this
     */
    public function setMaxZones($maxZones)
    {
        $this->maxZones = $maxZones;
        return $this;
    }

    /**
     * @return Main
     */
    public function getDefaultHost()
    {
        return $this->defaultHost;
    }

    /**
     * @param Main $defaultHost
     * @return $this
     */
    public function setDefaultHost($defaultHost)
    {
        $this->defaultHost = $defaultHost;
        return $this;
    }

    /**
     * @return Main
     */
    public function getCustomer()
    {
        return $this->Customer;
    }

    /**
     * @param Main $Customer
     * @return $this
     */
    public function setCustomer($Customer)
    {
        $this->Customer = $Customer;
        return $this;
    }

}