<?php

namespace Mjr\Library\EntitiesBundle\Entity\openVZ;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="openvz_ip")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\openVZ
 * @author Chris Westerfield <chris@mjr.one>
 */
class Ip
{
    use IdTrait;
    use LogableTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ActiveTrait;
    use ServerTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\openVZ\Vm", inversedBy="Ips", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="veid", referencedColumnName="veid")
     */
    protected $veid;
    /**
     * @ORM\Column(name="ip_address", type="string", length=64, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $IpAddress;
    /**
     * @ORM\Column(name="reserved", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Reserved;
    /**
     * @ORM\Column(name="additional", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Additional;

    /**
     * @return mixed
     */
    public function getVeid()
    {
        return $this->veid;
    }

    /**
     * @param mixed $veid
     * @return $this
     */
    public function setVeid($veid)
    {
        $this->veid = $veid;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->IpAddress;
    }

    /**
     * @param string $IpAddress
     * @return $this
     */
    public function setIpAddress($IpAddress)
    {
        $this->IpAddress = $IpAddress;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isReserved()
    {
        return $this->Reserved;
    }

    /**
     * @param boolean $Reserved
     * @return $this
     */
    public function setReserved($Reserved)
    {
        $this->Reserved = $Reserved;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAdditional()
    {
        return $this->Additional;
    }

    /**
     * @param boolean $Additional
     * @return $this
     */
    public function setAdditional($Additional)
    {
        $this->Additional = $Additional;
        return $this;
    }

}