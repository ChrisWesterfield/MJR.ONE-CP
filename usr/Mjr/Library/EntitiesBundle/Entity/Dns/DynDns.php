<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Customer\Main;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_dyndns")
 * @ORM\Entity()
 * @package Mjr\Library\EntitiesBundle\Entity\Web
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @Gedmo\Loggable( )
 */
class DynDns
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Dns\Records", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="record_id", referencedColumnName="id")
     * @var Domains;
     */
    protected $Record;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Dns\Domains", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
     * @var Domains;
     */
    protected $Domain;
    /**
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Username;
    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Password;

    /**
     * @return Domains
     */
    public function getRecord()
    {
        return $this->Record;
    }

    /**
     * @param Domains $Record
     * @return $this
     */
    public function setRecord($Record)
    {
        $this->Record = $Record;
        return $this;
    }

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
     * @return string
     */
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * @param string $Username
     * @return $this
     */
    public function setUsername($Username)
    {
        $this->Username = $Username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param string $Password
     * @return $this
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
        return $this;
    }


}