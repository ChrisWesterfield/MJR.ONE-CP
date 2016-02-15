<?php

namespace Mjr\Library\EntitiesBundle\Entity\Aps;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="aps_settings")
 * @ORM\Entity()
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Aps
 * @author Chris Westerfield <chris@mjr.one>
 * @Gedmo\Loggable( )
 */
class Settings
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     * @Gedmo\Versioned
     * @var string
     */
    protected $Name;
    /**
     * @ORM\Column(name="value", type="text", nullable=false)
     * @Gedmo\Versioned
     * @var string
     */
    protected $Value;

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
    public function getValue()
    {
        return unserialize($this->Value);
    }

    /**
     * @param string $Value
     * @return $this
     */
    public function setValue($Value)
    {
        $this->Value = serialize($Value);
        return $this;
    }
}