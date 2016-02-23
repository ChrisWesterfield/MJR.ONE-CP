<?php

namespace Mjr\Library\EntitiesBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="firewall_iptables")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity
 * @author Chris Westerfield <chris@mjr.one>
 */
class IpTables
{
    use LogableTrait;
    use SystemUserTrait;
    use SystemGroupTrait;
    use ServerTrait;
    use IdTrait;
    use ActiveTrait;
    /**
     * @ORM\Column(name="table", type="string", length=100, nullable=true)
     * @var string
     */
    protected $table;
    /**
     * @ORM\Column(name="source_ip", type="string", length=100, nullable=true)
     * @var string
     */
    protected $SourceIp;
    /**
     * @ORM\Column(name="target_ip", type="string", length=100, nullable=true)
     * @var string
     */
    protected $TargetIp;
    /**
     * @ORM\Column(name="protocol", type="string", length=100, nullable=true)
     * @var string
     */
    protected $Protocol;
    /**
     * @ORM\Column(name="single_port", type="string", length=100, nullable=true)
     * @var string
     */
    protected $SinglePort;
    /**
     * @ORM\Column(name="multi_port", type="string", length=100, nullable=true)
     * @var string
     */
    protected $MultiPort;
    /**
     * @ORM\Column(name="state", type="string", length=100, nullable=true)
     * @var string
     */
    protected $State;
    /**
     * @ORM\Column(name="target", type="string", length=100, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Target;

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     * @return $this
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceIp()
    {
        return $this->SourceIp;
    }

    /**
     * @param string $SourceIp
     * @return $this
     */
    public function setSourceIp($SourceIp)
    {
        $this->SourceIp = $SourceIp;
        return $this;
    }

    /**
     * @return string
     */
    public function getTargetIp()
    {
        return $this->TargetIp;
    }

    /**
     * @param string $TargetIp
     * @return $this
     */
    public function setTargetIp($TargetIp)
    {
        $this->TargetIp = $TargetIp;
        return $this;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->Protocol;
    }

    /**
     * @param string $Protocol
     * @return $this
     */
    public function setProtocol($Protocol)
    {
        $this->Protocol = $Protocol;
        return $this;
    }

    /**
     * @return string
     */
    public function getSinglePort()
    {
        return $this->SinglePort;
    }

    /**
     * @param string $SinglePort
     * @return $this
     */
    public function setSinglePort($SinglePort)
    {
        $this->SinglePort = $SinglePort;
        return $this;
    }

    /**
     * @return string
     */
    public function getMultiPort()
    {
        return $this->MultiPort;
    }

    /**
     * @param string $MultiPort
     * @return $this
     */
    public function setMultiPort($MultiPort)
    {
        $this->MultiPort = $MultiPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * @param string $State
     * @return $this
     */
    public function setState($State)
    {
        $this->State = $State;
        return $this;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->Target;
    }

    /**
     * @param string $Target
     * @return $this
     */
    public function setTarget($Target)
    {
        $this->Target = $Target;
        return $this;
    }
}