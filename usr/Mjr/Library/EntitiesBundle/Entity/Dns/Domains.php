<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_domains")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @author Chris Westerfield <chris@mjr.one>
 */
class Domains
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="master", type="string", length=128, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Master;
    /**
     * @ORM\Column(name="last_check", type="integer", nullable=true)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $LastCheck;
    /**
     * @ORM\Column(name="type", nullable=false, type="string", length=6)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;
    /**
     * @ORM\Column(name="notified_serial", type="integer", nullable=true)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $NotifiedSerial;
    /**
     * @ORM\Column(name="account", type="string", length=40, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Account;

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
     * @return string
     */
    public function getMaster()
    {
        return $this->Master;
    }

    /**
     * @param string $Master
     * @return $this
     */
    public function setMaster($Master)
    {
        $this->Master = $Master;
        return $this;
    }

    /**
     * @return int
     */
    public function getLastCheck()
    {
        return $this->LastCheck;
    }

    /**
     * @param int $LastCheck
     * @return $this
     */
    public function setLastCheck($LastCheck)
    {
        $this->LastCheck = $LastCheck;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     * @return $this
     */
    public function setType($Type)
    {
        $this->Type = $Type;
        return $this;
    }

    /**
     * @return int
     */
    public function getNotifiedSerial()
    {
        return $this->NotifiedSerial;
    }

    /**
     * @param int $NotifiedSerial
     * @return $this
     */
    public function setNotifiedSerial($NotifiedSerial)
    {
        $this->NotifiedSerial = $NotifiedSerial;
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