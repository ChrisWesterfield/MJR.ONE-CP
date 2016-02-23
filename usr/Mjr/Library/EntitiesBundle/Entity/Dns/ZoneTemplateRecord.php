<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_zone_template_records")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @author Chris Westerfield <chris@mjr.one>
 */
class ZoneTemplateRecord
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Dns\ZoneTemplate", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="zone_template_id", referencedColumnName="id", nullable=false)
     * @var integer
     */
    protected $Template;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="type", type="string", length=10, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;
    /**
     * @ORM\Column(name="content", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $content;
    /**
     * @ORM\Column(name="ttl", type="integer", precision=11, nullable=true)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Ttl;
    /**
     * @ORM\Column(name="prio", type="integer", precision=11, nullable=true)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Priority;

    /**
     * @return int
     */
    public function getTemplate()
    {
        return $this->Template;
    }

    /**
     * @param int $Template
     * @return $this
     */
    public function setTemplate($Template)
    {
        $this->Template = $Template;
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
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     * @return $this
     */
    public function setType($Type)
    {
        $this->Type = $Type;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getTtl()
    {
        return $this->Ttl;
    }

    /**
     * @param int $Ttl
     * @return $this
     */
    public function setTtl($Ttl)
    {
        $this->Ttl = $Ttl;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->Priority;
    }

    /**
     * @param int $Priority
     * @return $this
     */
    public function setPriority($Priority)
    {
        $this->Priority = $Priority;
        return $this;
    }

}