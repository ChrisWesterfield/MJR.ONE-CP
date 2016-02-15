<?php

namespace Mjr\Library\EntitiesBundle\Entity\Ftp;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="ftp_traffic")
 * @ORM\Entity()
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Ftp
 * @author Chris Westerfield <chris@mjr.one>
 */
class Traffic
{
    /**
     * @ORM\Id
     * @ORM\Column(name="host_name", type="string", length=255)
     * @var string
     */
    protected $HostName;
    /**
     * @ORM\Id
     * @ORM\Column(name="traffic_date", type="date", length=255)
     * @var string
     */
    protected $TrafficDate;
    /**
     * @ORM\Column(name="in_bytes", type="integer", options={"unsigned"=true, "default"=0})
     * @var integer
     */
    protected $InBytes;
    /**
     * @ORM\Column(name="out_bytes", type="integer", options={"unsigned"=true, "default"=0})
     * @var integer
     */
    protected $OutBytes;

    /**
     * @return string
     */
    public function getHostName()
    {
        return $this->HostName;
    }

    /**
     * @param string $HostName
     * @return $this
     */
    public function setHostName($HostName)
    {
        $this->HostName = $HostName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrafficDate()
    {
        return $this->TrafficDate;
    }

    /**
     * @param string $TrafficDate
     * @return $this
     */
    public function setTrafficDate($TrafficDate)
    {
        $this->TrafficDate = $TrafficDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getInBytes()
    {
        return $this->InBytes;
    }

    /**
     * @param int $InBytes
     * @return $this
     */
    public function setInBytes($InBytes)
    {
        $this->InBytes = $InBytes;
        return $this;
    }

    /**
     * @return int
     */
    public function getOutBytes()
    {
        return $this->OutBytes;
    }

    /**
     * @param int $OutBytes
     * @return $this
     */
    public function setOutBytes($OutBytes)
    {
        $this->OutBytes = $OutBytes;
        return $this;
    }

    /**
     * Cron constructor.
     * @param $host
     * @param $date
     * @param $in
     * @param $out
     */
    public function __construct($host,$date, $in, $out)
    {
        $this->HostName = $host;
        $this->TrafficDate = $date;
        $this->InBytes = $in;
        $this->OutBytes = $out;
    }
}