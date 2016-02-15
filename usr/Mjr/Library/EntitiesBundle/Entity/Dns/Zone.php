<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Customer\Main;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_zone")
 * @ORM\Entity()
 * @Gedmo\Loggable( )
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @author Chris Westerfield <chris@mjr.one>
 */
class Zone
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Dns\Domains", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
     * @var Domains;
     */
    protected $Domain;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Customer\Main", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="owner", referencedColumnName="id")
     * @var Main;
     */
    protected $Owner;
    /**
     * @ORM\Column(name="comment", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Comment;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Dns\ZoneTemplate", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="zone_template_id", referencedColumnName="id")
     * @var Main;
     */
    protected $Template;

    /**
     * @return Domains
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * @param Domains $Domain
     * @return $this
     */
    public function setDomain($Domain)
    {
        $this->Domain = $Domain;
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

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->Comment;
    }

    /**
     * @param string $Comment
     * @return $this
     */
    public function setComment($Comment)
    {
        $this->Comment = $Comment;
        return $this;
    }

    /**
     * @return Main
     */
    public function getTemplate()
    {
        return $this->Template;
    }

    /**
     * @param Main $Template
     * @return $this
     */
    public function setTemplate($Template)
    {
        $this->Template = $Template;
        return $this;
    }



}