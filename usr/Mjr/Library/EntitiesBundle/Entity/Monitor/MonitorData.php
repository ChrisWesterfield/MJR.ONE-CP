<?php


namespace Mjr\Library\EntitiesBundle\Entity\Monitor;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;


/**
 * @ORM\Table(name="monitor_data")
 * @ORM\Entity()
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Monitor
 * @author Chris Westerfield <chris@mjr.one>
 */
class MonitorData
{
    use ServerTrait;
    use IdTrait;
    /**
     * @ORM\Column(name="created", type="integer", nullable=false)
     * @var integer
     */
    protected $Created;
    /**
     * @ORM\Column(name="data", type="text", nullable=false)
     * @var string
     */
    protected $Data;
    /**
     * @ORM\Column(name="state", type="string", length=50, nullable=false)
     * @var string
     */
    protected $State;

    /**
     * @return int
     */
    public function getCreated()
    {
        return $this->Created;
    }

    /**
     * @param int $Created
     * @return $this
     */
    public function setCreated($Created)
    {
        $this->Created = $Created;
        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->Data;
    }

    /**
     * @param string $Data
     * @return $this
     */
    public function setData($Data)
    {
        $this->Data = $Data;
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

}