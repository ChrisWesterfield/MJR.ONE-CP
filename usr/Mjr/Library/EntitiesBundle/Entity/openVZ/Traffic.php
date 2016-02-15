<?php

namespace Mjr\Library\EntitiesBundle\Entity\openVZ;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;

/**
 * @ORM\Table(name="openvz_traffic")
 * @ORM\Entity()
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\openVZ
 * @author Chris Westerfield <chris@mjr.one>
 */
class Traffic
{
    use IdTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\openVZ\Vm", inversedBy="Traffic", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="veid", referencedColumnName="veid")
     */
    protected $Veid;
    /**
     * @ORM\Column(name="traffic_date", type="datetime", nullable=false)
     * @var DateTime;
     */
    protected $TrafficDate;
    /**
     * @ORM\Column(name="traffic_bytes", type="bigint", nullable=false, options={"default"=0})
     * @var integer
     */
    protected $TrafficBytes;

    /**
     * @return mixed
     */
    public function getVeid()
    {
        return $this->Veid;
    }

    /**
     * @param mixed $Veid
     * @return $this
     */
    public function setVeid($Veid)
    {
        $this->Veid = $Veid;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTrafficDate()
    {
        return $this->TrafficDate;
    }

    /**
     * @param DateTime $TrafficDate
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
    public function getTrafficBytes()
    {
        return $this->TrafficBytes;
    }

    /**
     * @param int $TrafficBytes
     * @return $this
     */
    public function setTrafficBytes($TrafficBytes)
    {
        $this->TrafficBytes = $TrafficBytes;
        return $this;
    }

}