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
 * @ORM\Table(name="mail_get")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class GetMail
{
    use IdTrait;
    use ServerTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ActiveTrait;
    /**
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;
    /**
     * @ORM\Column(name="source_server", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SourceServer;
    /**
     * @ORM\Column(name="source_username", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SourceUsername;
    /**
     * @ORM\Column(name="source_password", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SourcePassword;
    /**
     * @ORM\Column(name="source_delete", type="string", length=255, nullable=true, options={"default"="y"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $SourceDelete;
    /**
     * @ORM\Column(name="source_read_all", type="string", length=255, nullable=true, options={"default"="y"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $SourceReadAll;
    /**
     * @ORM\Column(name="destination", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Destination;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Domain", inversedBy="MailForward", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
     * @var Domain
     */
    protected $Domain;

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
    public function getSourceServer()
    {
        return $this->SourceServer;
    }

    /**
     * @param string $SourceServer
     * @return $this
     */
    public function setSourceServer($SourceServer)
    {
        $this->SourceServer = $SourceServer;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceUsername()
    {
        return $this->SourceUsername;
    }

    /**
     * @param string $SourceUsername
     * @return $this
     */
    public function setSourceUsername($SourceUsername)
    {
        $this->SourceUsername = $SourceUsername;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourcePassword()
    {
        return $this->SourcePassword;
    }

    /**
     * @param string $SourcePassword
     * @return $this
     */
    public function setSourcePassword($SourcePassword)
    {
        $this->SourcePassword = $SourcePassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceDelete()
    {
        return $this->SourceDelete;
    }

    /**
     * @param string $SourceDelete
     * @return $this
     */
    public function setSourceDelete($SourceDelete)
    {
        $this->SourceDelete = $SourceDelete;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceReadAll()
    {
        return $this->SourceReadAll;
    }

    /**
     * @param string $SourceReadAll
     * @return $this
     */
    public function setSourceReadAll($SourceReadAll)
    {
        $this->SourceReadAll = $SourceReadAll;
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