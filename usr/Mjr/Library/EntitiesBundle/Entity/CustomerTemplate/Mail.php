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
 * @ORM\Table(name="template_customer_mail")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\CustomerTemplate
 * @author Chris Westerfield <chris@mjr.one>
 */
class Mail
{
    use serializeTrait;
    use LogableTrait;
    use IdTrait;
    /**
     * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Main", inversedBy="Mail", fetch="EXTRA_LAZY")
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
     * @ORM\JoinTable(name="template_customer_mail_host",
     *     joinColumns={
     *          @ORM\JoinColumn(name="host_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={@ORM\JoinColumn(name="website_id", referencedColumnName="id", unique=true)}
     * )
     * @var ArrayCollection
     */
    protected $hosts;
    /**
     * @ORM\Column(name="max_email_domain", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxEmailDomain;
    /**
     * @ORM\Column(name="max_email_mail_box", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxEmailMailBox;
    /**
     * @ORM\Column(name="max_email_asias", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxEmailAsias;
    /**
     * @ORM\Column(name="max_mail_list", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxMailList;
    /**
     * @ORM\Column(name="max_email_forward", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxEmailForward;
    /**
     * @ORM\Column(name="max_email_catchall", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxEmailCatchall;
    /**
     * @ORM\Column(name="max_email_route", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxEmailRoute;
    /**
     * @ORM\Column(name="max_email_filter", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxEmailFilter;
    /**
     * @ORM\Column(name="max_fetchmail", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxFetchmail;
    /**
     * @ORM\Column(name="max_spam_filter_lists", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxSpamFilterLists;
    /**
     * @ORM\Column(name="max_spam_filter_user", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxSpamFilterUser;
    /**
     * @ORM\Column(name="max_mail_policy", type="integer", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxMailPolicy;
    /**
     * @ORM\Column(name="max_mail_storage", type="bigint", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $maxMailStorage;

    /**
     * Website constructor.
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
    public function getMaxEmailDomain()
    {
        return $this->maxEmailDomain;
    }

    /**
     * @param int $maxEmailDomain
     * @return $this
     */
    public function setMaxEmailDomain($maxEmailDomain)
    {
        $this->maxEmailDomain = $maxEmailDomain;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxEmailMailBox()
    {
        return $this->maxEmailMailBox;
    }

    /**
     * @param int $maxEmailMailBox
     * @return $this
     */
    public function setMaxEmailMailBox($maxEmailMailBox)
    {
        $this->maxEmailMailBox = $maxEmailMailBox;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxEmailAsias()
    {
        return $this->maxEmailAsias;
    }

    /**
     * @param int $maxEmailAsias
     * @return $this
     */
    public function setMaxEmailAsias($maxEmailAsias)
    {
        $this->maxEmailAsias = $maxEmailAsias;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxMailList()
    {
        return $this->maxMailList;
    }

    /**
     * @param int $maxMailList
     * @return $this
     */
    public function setMaxMailList($maxMailList)
    {
        $this->maxMailList = $maxMailList;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxEmailForward()
    {
        return $this->maxEmailForward;
    }

    /**
     * @param int $maxEmailForward
     * @return $this
     */
    public function setMaxEmailForward($maxEmailForward)
    {
        $this->maxEmailForward = $maxEmailForward;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxEmailCatchall()
    {
        return $this->maxEmailCatchall;
    }

    /**
     * @param int $maxEmailCatchall
     * @return $this
     */
    public function setMaxEmailCatchall($maxEmailCatchall)
    {
        $this->maxEmailCatchall = $maxEmailCatchall;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxEmailRoute()
    {
        return $this->maxEmailRoute;
    }

    /**
     * @param int $maxEmailRoute
     * @return $this
     */
    public function setMaxEmailRoute($maxEmailRoute)
    {
        $this->maxEmailRoute = $maxEmailRoute;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxEmailFilter()
    {
        return $this->maxEmailFilter;
    }

    /**
     * @param int $maxEmailFilter
     * @return $this
     */
    public function setMaxEmailFilter($maxEmailFilter)
    {
        $this->maxEmailFilter = $maxEmailFilter;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxFetchmail()
    {
        return $this->maxFetchmail;
    }

    /**
     * @param int $maxFetchmail
     * @return $this
     */
    public function setMaxFetchmail($maxFetchmail)
    {
        $this->maxFetchmail = $maxFetchmail;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxSpamFilterLists()
    {
        return $this->maxSpamFilterLists;
    }

    /**
     * @param int $maxSpamFilterLists
     * @return $this
     */
    public function setMaxSpamFilterLists($maxSpamFilterLists)
    {
        $this->maxSpamFilterLists = $maxSpamFilterLists;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxSpamFilterUser()
    {
        return $this->maxSpamFilterUser;
    }

    /**
     * @param int $maxSpamFilterUser
     * @return $this
     */
    public function setMaxSpamFilterUser($maxSpamFilterUser)
    {
        $this->maxSpamFilterUser = $maxSpamFilterUser;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxMailPolicy()
    {
        return $this->maxMailPolicy;
    }

    /**
     * @param int $maxMailPolicy
     * @return $this
     */
    public function setMaxMailPolicy($maxMailPolicy)
    {
        $this->maxMailPolicy = $maxMailPolicy;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxMailStorage()
    {
        return $this->maxMailStorage;
    }

    /**
     * @param int $maxMailStorage
     * @return $this
     */
    public function setMaxMailStorage($maxMailStorage)
    {
        $this->maxMailStorage = $maxMailStorage;
        return $this;
    }
}