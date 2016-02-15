<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Customer\Main;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_zone_template")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @author Chris Westerfield <chris@mjr.one>
 */
class ZoneTemplate
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
     * @ORM\Column(name="description", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Description;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Customer\Main", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="owner", referencedColumnName="id")
     * @var Main;
     */
    protected $Owner;

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
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     * @return $this
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @return Main
     */
    public function getOwner()
    {
        return $this->Owner;
    }

    /**
     * @param Main $Owner
     * @return $this
     */
    public function setOwner($Owner)
    {
        $this->Owner = $Owner;
        return $this;
    }


}