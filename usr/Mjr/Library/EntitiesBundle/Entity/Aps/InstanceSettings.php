<?php

namespace Mjr\Library\EntitiesBundle\Entity\Aps;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;

/**
 * @ORM\Table(name="aps_instances_settings")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Aps
 * @author Chris Westerfield <chris@mjr.one>
 */
class InstancesSettings
{
    use IdTrait;
    use ServerTrait;
    use LogableTrait;
    /**
     * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Aps\Instances", inversedBy="InstanceSettings", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="settings_id", referencedColumnName="id")
     */
    protected $Instance;
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
     * @return mixed
     */
    public function getInstance()
    {
        return $this->Instance;
    }

    /**
     * @param mixed $Instance
     * @return $this
     */
    public function setInstance($Instance)
    {
        $this->Instance = $Instance;
        return $this;
    }

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