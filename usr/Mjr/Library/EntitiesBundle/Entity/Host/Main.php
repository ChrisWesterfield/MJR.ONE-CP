<?php


namespace Mjr\Library\EntitiesBundle\Entity\Host;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="host_main")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Host
 * @author Chris Westerfield <chris@mjr.one>
 */
class Main
{
    use SystemGroupTrait;
    use SystemUserTrait;
    use LogableTrait;
    use IdTrait;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="mail", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Mail;
    /**
     * @ORM\Column(name="web", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Web;
    /**
     * @ORM\Column(name="dns", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Dns;
    /**
     * @ORM\Column(name="file", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $File;
    /**
     * @ORM\Column(name="mysql", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $mysql;
    /**
     * @ORM\Column(name="pgsql", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $pgsql;
    /**
     * @ORM\Column(name="memcached", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $memcached;
    /**
     * @ORM\Column(name="mongodb", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $mongodb;
    /**
     * @ORM\Column(name="proxy", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $proxy;
    /**
     * @ORM\Column(name="vserver", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $vserver;
    /**
     * @ORM\Column(name="firewall", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $firewall;
    /**
     * @ORM\Column(name="xmpp", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $xmpp;
    /**
     * @ORM\Column(name="config", type="string", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $config;
    /**
     * @ORM\Column(name="updated", type="integer", nullable=true)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $updated;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", inversedBy="mirrorChilds", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="mirror_server_id", referencedColumnName="id")
     * @var Main
     */
    protected $mirrorServer;
    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", mappedBy="mirrorServer", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $mirrorChilds;
    /**
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Active;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return $this
     */
    public function setName($Name)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @param Main $main
     * @return $this
     */
    public function addMirrorChild(Main $main)
    {
        $this->mirrorChilds->add($main);
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getMirrorChilds()
    {
        return $this->mirrorChilds;
    }

    /**
     * @param Main $main
     * @return bool
     */
    public function hasMirrorChild(Main $main)
    {
        return $this->mirrorChilds->contains($main);
    }

    public function removeMirrorChild(Main $main)
    {
        if($this->hasMirrorChild($main))
        {
            $this->mirrorChilds->removeElement($main);
            return true;
        }
        return false;
    }

    /**
     * @return boolean
     */
    public function isMail()
    {
        return $this->Mail;
    }

    /**
     * @param boolean $Mail
     * @return $this
     */
    public function setMail($Mail)
    {
        $this->Mail = $Mail;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWeb()
    {
        return $this->Web;
    }

    /**
     * @param boolean $Web
     * @return $this
     */
    public function setWeb($Web)
    {
        $this->Web = $Web;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDns()
    {
        return $this->Dns;
    }

    /**
     * @param boolean $Dns
     * @return $this
     */
    public function setDns($Dns)
    {
        $this->Dns = $Dns;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFile()
    {
        return $this->File;
    }

    /**
     * @param boolean $File
     * @return $this
     */
    public function setFile($File)
    {
        $this->File = $File;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMysql()
    {
        return $this->mysql;
    }

    /**
     * @param boolean $mysql
     * @return $this
     */
    public function setMysql($mysql)
    {
        $this->mysql = $mysql;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPgsql()
    {
        return $this->pgsql;
    }

    /**
     * @param boolean $pgsql
     * @return $this
     */
    public function setPgsql($pgsql)
    {
        $this->pgsql = $pgsql;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMemcached()
    {
        return $this->memcached;
    }

    /**
     * @param boolean $memcached
     * @return $this
     */
    public function setMemcached($memcached)
    {
        $this->memcached = $memcached;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMongodb()
    {
        return $this->mongodb;
    }

    /**
     * @param boolean $mongodb
     * @return $this
     */
    public function setMongodb($mongodb)
    {
        $this->mongodb = $mongodb;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isProxy()
    {
        return $this->proxy;
    }

    /**
     * @param boolean $proxy
     * @return $this
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isVserver()
    {
        return $this->vserver;
    }

    /**
     * @param boolean $vserver
     * @return $this
     */
    public function setVserver($vserver)
    {
        $this->vserver = $vserver;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isFirewall()
    {
        return $this->firewall;
    }

    /**
     * @param boolean $firewall
     * @return $this
     */
    public function setFirewall($firewall)
    {
        $this->firewall = $firewall;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isXmpp()
    {
        return $this->xmpp;
    }

    /**
     * @param boolean $xmpp
     * @return $this
     */
    public function setXmpp($xmpp)
    {
        $this->xmpp = $xmpp;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param string $config
     * @return $this
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return int
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param int $updated
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return Main
     */
    public function getMirrorServer()
    {
        return $this->mirrorServer;
    }

    /**
     * @param Main $mirrorServer
     * @return $this
     */
    public function setMirrorServer($mirrorServer)
    {
        $this->mirrorServer = $mirrorServer;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->Active;
    }

    /**
     * @param boolean $Active
     * @return $this
     */
    public function setActive($Active)
    {
        $this->Active = $Active;
        return $this;
    }


}