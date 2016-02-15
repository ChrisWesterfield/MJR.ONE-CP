<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_cryptokeys")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @author Chris Westerfield <chris@mjr.one>
 */
class CryptoKeys
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
     * @ORM\Column(name="flags", type="integer", nullable=false)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Flags;
    /**
     * @ORM\Column(name="active", type="integer", precision=1, nullable=true)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Active;
    /**
     * @ORM\Column(name="content", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Content;

    /**
     * @return integer
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * @param integer $Domain
     * @return $this
     */
    public function setDomain($Domain)
    {
        $this->Domain = $Domain;
        return $this;
    }

    /**
     * @return int
     */
    public function getFlags()
    {
        return $this->Flags;
    }

    /**
     * @param int $Flags
     * @return $this
     */
    public function setFlags($Flags)
    {
        $this->Flags = $Flags;
        return $this;
    }

    /**
     * @return int
     */
    public function getActive()
    {
        return $this->Active;
    }

    /**
     * @param int $Active
     * @return $this
     */
    public function setActive($Active)
    {
        $this->Active = $Active;
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