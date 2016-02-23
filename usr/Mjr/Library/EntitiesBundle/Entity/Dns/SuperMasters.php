<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_supermaster")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @author Chris Westerfield <chris@mjr.one>
 */
class SuperMaster
{
    use LogableTrait;
    /**
     * @ORM\Id
     * @ORM\Column(name="ip", type="string", length=128, nullable=false, nullable=false)
     * @var string
     */
    protected $Ip;
    /**
     * @ORM\Column(name="name_server", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $NameServer;
    /**
     * @ORM\Column(name="account", type="string", length=40, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Account;

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->Ip;
    }

    /**
     * @param string $Ip
     * @return $this
     */
    public function setIp($Ip)
    {
        $this->Ip = $Ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameServer()
    {
        return $this->NameServer;
    }

    /**
     * @param string $NameServer
     * @return $this
     */
    public function setNameServer($NameServer)
    {
        $this->NameServer = $NameServer;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->Account;
    }

    /**
     * @param string $Account
     * @return $this
     */
    public function setAccount($Account)
    {
        $this->Account = $Account;
        return $this;
    }

}