<?php


namespace Mjr\Library\EntitiesBundle\Entity\Mail;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="mail_transport")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class Transport
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ServerTrait;
    use ActiveTrait;
    use LogableTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Domain", inversedBy="MailTransports", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
     * @var Domain
     */
    protected $Domain;
    /**
     * @ORM\Column(name="transport", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Transport;
    /**
     * @ORM\Column(name="sort_order", type="integer", nullable=false, options={"unsigned"=true, "default"=5})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $SortOrder;

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

    /**
     * @return string
     */
    public function getTransport()
    {
        return $this->Transport;
    }

    /**
     * @param string $Transport
     * @return $this
     */
    public function setTransport($Transport)
    {
        $this->Transport = $Transport;
        return $this;
    }

    /**
     * @return int
     */
    public function getSortOrder()
    {
        return $this->SortOrder;
    }

    /**
     * @param int $SortOrder
     * @return $this
     */
    public function setSortOrder($SortOrder)
    {
        $this->SortOrder = $SortOrder;
        return $this;
    }
}