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
 * @ORM\Table(name="template_customer_system")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\CustomerTemplate
 * @author Chris Westerfield <chris@mjr.one>
 */
class System
{
    use serializeTrait;
    use LogableTrait;
    use IdTrait;
    /**
     * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Main", inversedBy="Database", fetch="EXTRA_LAZY")
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
     * @ORM\JoinTable(name="template_customer_system_host",
     *     joinColumns={
     *          @ORM\JoinColumn(name="host_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={@ORM\JoinColumn(name="website_id", referencedColumnName="id", unique=true)}
     * )
     * @var ArrayCollection
     */
    protected $hosts;

    /**
     * @ORM\Column(name="max_sshusers", type="integer", nullable=false, options={"default"=0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxSSHUsers;

    /**
     * @ORM\Column(name="max_cron_jobs", type="integer", nullable=false, options={"default"=0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxCronJobs;

    /**
     * @ORM\Column(name="jailkit", type="boolean", nullable=false, options={"default" = false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $jailkit;

    /**
     * @ORM\Column(name="full_cron", type="boolean", nullable=false, options={"default" = false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $fullCron;

    /**
     * @ORM\Column(name="jail_kit_cron", type="boolean", nullable=false, options={"default" = false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $jailKitCron;

    /**
     * @ORM\Column(name="web_cron", type="boolean", nullable=false, options={"default" = false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $webCron;

    /**
     * Mail constructor.
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
        if($this->hasHost($main))
        {
            $this->hosts->removeElement($main);
            return true;
        }
        return false;
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
     * @return int
     */
    public function getMaxSSHUsers()
    {
        return $this->maxSSHUsers;
    }

    /**
     * @param int $maxSSHUsers
     * @return $this
     */
    public function setMaxSSHUsers($maxSSHUsers)
    {
        $this->maxSSHUsers = $maxSSHUsers;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxCronJobs()
    {
        return $this->maxCronJobs;
    }

    /**
     * @param int $maxCronJobs
     * @return $this
     */
    public function setMaxCronJobs($maxCronJobs)
    {
        $this->maxCronJobs = $maxCronJobs;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isJailkit()
    {
        return $this->jailkit;
    }

    /**
     * @param boolean $jailkit
     * @return $this
     */
    public function setJailkit($jailkit)
    {
        $this->jailkit = $jailkit;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFullCron()
    {
        return $this->fullCron;
    }

    /**
     * @param boolean $fullCron
     * @return $this
     */
    public function setFullCron($fullCron)
    {
        $this->fullCron = $fullCron;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isJailKitCron()
    {
        return $this->jailKitCron;
    }

    /**
     * @param boolean $jailKitCron
     * @return $this
     */
    public function setJailKitCron($jailKitCron)
    {
        $this->jailKitCron = $jailKitCron;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWebCron()
    {
        return $this->webCron;
    }

    /**
     * @param boolean $webCron
     * @return $this
     */
    public function setWebCron($webCron)
    {
        $this->webCron = $webCron;
        return $this;
    }



}