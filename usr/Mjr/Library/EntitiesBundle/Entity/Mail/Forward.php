<?php


namespace Mjr\Library\EntitiesBundle\Entity\Mail;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="mail_forward")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class Forward
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ServerTrait;
    use ActiveTrait;
    /**
     * Allowed Types
     */
    protected $AllowedType=array('alias','aliasdomain','forward','catchall');
    /**
     * @ORM\Column(name="source", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Source;
    /**
     * @ORM\Column(name="destination", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Destination;
    /**
     * @ORM\Column(name="type", type="string", length=16, nullable=false, options={"default"="alias"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;
    /**
     * @ORM\Column(name="allow_send_as", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $AllowSendAs;
    /**
     * @ORM\Column(name="grey_listing", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $GreyListing;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Domain", inversedBy="MailForward", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
     * @var Domain
     */
    protected $Domain;

    /**
     * @return array
     */
    public function getAllowedType()
    {
        return $this->AllowedType;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->Source;
    }

    /**
     * @param string $Source
     * @return $this
     */
    public function setSource($Source)
    {
        $this->Source = $Source;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->Destination;
    }

    /**
     * @param string $Destination
     * @return $this
     */
    public function setDestination($Destination)
    {
        $this->Destination = $Destination;
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
        if(!in_array($Type,$this->AllowedType))
        {
            $Type = 'alias';
        }
        $this->Type = $Type;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAllowSendAs()
    {
        return $this->AllowSendAs;
    }

    /**
     * @param boolean $AllowSendAs
     * @return $this
     */
    public function setAllowSendAs($AllowSendAs)
    {
        $this->AllowSendAs = $AllowSendAs;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isGreyListing()
    {
        return $this->GreyListing;
    }

    /**
     * @param boolean $GreyListing
     * @return $this
     */
    public function setGreyListing($GreyListing)
    {
        $this->GreyListing = $GreyListing;
        return $this;
    }

    /**
     * @return Domain
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * @param Domain $Domain
     * @return $this
     */
    public function setDomain($Domain)
    {
        $this->Domain = $Domain;
        return $this;
    }

}