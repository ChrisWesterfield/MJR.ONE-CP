<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_comments")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @author Chris Westerfield <chris@mjr.one>
 */
class Comments
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;
    /**
     * @ORM\Column(name="modified_at", type="integer", nullable=false, precision=11)
     * @var integer
     * @Gedmo\Versioned
     */
    protected $ModifiedAt;
    /**
     * @ORM\Column(name="account", type="string", length=40, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Account;
    /**
     * @ORM\Column(name="comment", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Comment;

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
     * @return int
     */
    public function getModifiedAt()
    {
        return $this->ModifiedAt;
    }

    /**
     * @param int $ModifiedAt
     * @return $this
     */
    public function setModifiedAt($ModifiedAt)
    {
        $this->ModifiedAt = $ModifiedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->Account;
    }

    /**
     * @param string $Account
     * @return $this
     */
    public function setAccount($Account)
    {
        $this->Account = $Account;
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

}