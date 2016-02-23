<?php

namespace Mjr\Library\EntitiesBundle\Entity\Web;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;

/**
 * @ORM\Table(name="web_traffic")
 * @ORM\Entity()
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Web
 * @author Chris Westerfield <chris@mjr.one>
 */
class Traffic
{
    use IdTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", inversedBy="Traffics", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
     */
    protected $Domain;
    /**
     * @ORM\Column(name="traffic_date", type="datetime", nullable=false)
     * @var \DateTime
     */
    protected $TrafficDate;
    /**
     * @ORM\Column(name="traffic_bytes", type="bigint", precision=32, nullable=false, options={"default"=0})
     * @var integer
     */
    protected $TrafficBytes;

    /**
     * @return WebDomain
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * @param WebDomain $Domain
     * @return $this
     */
    public function setDomain(WebDomain $Domain)
    {
        $this->Domain = $Domain;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTrafficDate()
    {
        return $this->TrafficDate;
    }

    /**
     * @param \DateTime $TrafficDate
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