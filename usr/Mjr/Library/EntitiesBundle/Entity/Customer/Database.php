<?php


namespace Mjr\Library\EntitiesBundle\Entity\Customer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;


/**
 * @ORM\Table(name="customer_database")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Customer
 * @author Chris Westerfield <chris@mjr.one>
 */
class Database
{
    use serializeTrait;
    use LogableTrait;
    use IdTrait;
    /**
     * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Main", inversedBy="Database", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * @var Main
     */
    protected $Customer;
    /**
     * @ORM\OneToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="host_id", referencedColumnName="id")
     * @var Main
     */
    protected $defaultHost;
    /**
     * @ORM\ManyToMany(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="customer_database_host",
     *     joinColumns={
     *          @ORM\JoinColumn(name="host_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={@ORM\JoinColumn(name="website_id", referencedColumnName="id", unique=true)}
     * )
     * @var ArrayCollection
     */
    protected $hosts;

    /**
     * @ORM\Column(name="max_users", type="integer", nullable=false, options={"default"=0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxUsers;

    /**
     * @ORM\Column(name="max_databases", type="integer", nullable=false, options={"default"=0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $maxDatabases;

    /**
     * @ORM\Column(name="has_mysql", type="boolean", nullable=false, options={"default" = false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $hasMysql;

    /**
     * @ORM\Column(name="has_pg_sql", type="boolean", nullable=false, options={"default" = false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $hasPgSQL;

    /**
     * @ORM\Column(name="has_mongo_db", type="boolean", nullable=false, options={"default" = false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $hasMongoDb;

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
    public function getMaxUsers()
    {
        return $this->maxUsers;
    }

    /**
     * @param int $maxUsers
     * @return $this
     */
    public function setMaxUsers($maxUsers)
    {
        $this->maxUsers = $maxUsers;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxDatabases()
    {
        return $this->maxDatabases;
    }

    /**
     * @param int $maxDatabases
     * @return $this
     */
    public function setMaxDatabases($maxDatabases)
    {
        $this->maxDatabases = $maxDatabases;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHasMysql()
    {
        return $this->hasMysql;
    }

    /**
     * @param boolean $hasMysql
     * @return $this
     */
    public function setHasMysql($hasMysql)
    {
        $this->hasMysql = $hasMysql;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHasPgSQL()
    {
        return $this->hasPgSQL;
    }

    /**
     * @param boolean $hasPgSQL
     * @return $this
     */
    public function setHasPgSQL($hasPgSQL)
    {
        $this->hasPgSQL = $hasPgSQL;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHasMongoDb()
    {
        return $this->hasMongoDb;
    }

    /**
     * @param boolean $hasMongoDb
     * @return $this
     */
    public function setHasMongoDb($hasMongoDb)
    {
        $this->hasMongoDb = $hasMongoDb;
        return $this;
    }


}