<?php

namespace Mjr\Library\EntitiesBundle\Entity\Spam;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="spamfilter_users")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Spam
 * @author Chris Westerfield <chris@mjr.one>
 */
class Users
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ServerTrait;
    use ActiveTrait;
    /**
     * @ORM\Column(name="priority", type="integer", precision=3, nullable=false, options={"default"=5})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Priority;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Spam\Policy", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="policy_id", referencedColumnName="id")
     * @var Policy
     */
    protected $Policy;
    /**
     * @ORM\Column(name="email", type="string", nullable=false, length=255)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Email;
    /**
     * @ORM\Column(name="fullname", type="string", nullable=true, length=64)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Fullname;
    /**
     * @ORM\Column(name="local", type="boolean", nullable=true)
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $Local;

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->Priority;
    }

    /**
     * @param mixed $Priority
     * @return $this
     */
    public function setPriority($Priority)
    {
        $this->Priority = $Priority;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPolicy()
    {
        return $this->Policy;
    }

    /**
     * @param mixed $Policy
     * @return $this
     */
    public function setPolicy($Policy)
    {
        $this->Policy = $Policy;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     * @return $this
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->Fullname;
    }

    /**
     * @param string $Fullname
     * @return $this
     */
    public function setFullname($Fullname)
    {
        $this->Fullname = $Fullname;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isLocal()
    {
        return $this->Local;
    }

    /**
     * @param boolean $Local
     * @return $this
     */
    public function setLocal($Local)
    {
        $this->Local = $Local;
        return $this;
    }
}