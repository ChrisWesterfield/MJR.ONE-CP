<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_domain_meta_data")
 * @ORM\Entity()
 * @Gedmo\Loggable( )
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @author Chris Westerfield <chris@mjr.one>
 */
class DomainMetaData
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Dns\Domains", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id", nullable=false)
     * @var integer
     */
    protected $Domain;
    /**
     * @ORM\Column(name="kind", type="string", length=32, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Kind;
    /**
     * @ORM\Column(name="content", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Content;

    /**
     * @return int
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * @param int $Domain
     * @return $this
     */
    public function setDomain($Domain)
    {
        $this->Domain = $Domain;
        return $this;
    }

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->Kind;
    }

    /**
     * @param string $Kind
     * @return $this
     */
    public function setKind($Kind)
    {
        $this->Kind = $Kind;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * @param string $Content
     * @return $this
     */
    public function setContent($Content)
    {
        $this->Content = $Content;
        return $this;
    }

}