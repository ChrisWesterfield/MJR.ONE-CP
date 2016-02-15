<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_records")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @author Chris Westerfield <chris@mjr.one>
 */
class Records
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Dns\Domains", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Domain;
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
     * @ORM\Column(name="change_date", type="integer", nullable=true, precision=11)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $ChangeDate;
    /**
     * @ORM\Column(name="disabled", type="integer", nullable=true, precision=1, options={"default"=0})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Disabled;
    /**
     * @ORM\Column(name="ordername", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Ordername;
    /**
     * @ORM\Column(name="auth", type="integer", precision=1, nullable=true, options={"default"=1})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Auth;

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * @param string $Domain
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

    /**
     * @return int
     */
    public function getChangeDate()
    {
        return $this->ChangeDate;
    }

    /**
     * @param int $ChangeDate
     * @return $this
     */
    public function setChangeDate($ChangeDate)
    {
        $this->ChangeDate = $ChangeDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getDisabled()
    {
        return $this->Disabled;
    }

    /**
     * @param int $Disabled
     * @return $this
     */
    public function setDisabled($Disabled)
    {
        $this->Disabled = $Disabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrdername()
    {
        return $this->Ordername;
    }

    /**
     * @param string $Ordername
     * @return $this
     */
    public function setOrdername($Ordername)
    {
        $this->Ordername = $Ordername;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuth()
    {
        return $this->Auth;
    }

    /**
     * @param int $Auth
     * @return $this
     */
    public function setAuth($Auth)
    {
        $this->Auth = $Auth;
        return $this;
    }

}