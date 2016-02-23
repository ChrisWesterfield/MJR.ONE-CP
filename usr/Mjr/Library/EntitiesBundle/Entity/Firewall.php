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
 * @ORM\Table(name="firewall_main")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity
 * @author Chris Westerfield <chris@mjr.one>
 */
class Firewall
{
    use LogableTrait;
    use SystemUserTrait;
    use SystemGroupTrait;
    use ServerTrait;
    use IdTrait;
    use ActiveTrait;
    /**
     * @ORM\Column(name="tcp_port", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $TcpPort;
    /**
     * @ORM\Column(name="udp_port", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $UdpPort;

    /**
     * @return string
     */
    public function getTcpPort()
    {
        return $this->TcpPort;
    }

    /**
     * @param string $TcpPort
     * @return $this
     */
    public function setTcpPort($TcpPort)
    {
        $this->TcpPort = $TcpPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getUdpPort()
    {
        return $this->UdpPort;
    }

    /**
     * @param string $UdpPort
     * @return $this
     */
    public function setUdpPort($UdpPort)
    {
        $this->UdpPort = $UdpPort;
        return $this;
    }
}