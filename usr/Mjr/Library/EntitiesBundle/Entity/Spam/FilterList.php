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
 * @ORM\Table(name="spamfilter_list_black_and_white")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Spam
 * @author Chris Westerfield <chris@mjr.one>
 */
class FilterList
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ServerTrait;
    use ActiveTrait;
    use LogableTrait;
    /**
     * @ORM\Column(name="black_list", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $BlackList;
    /**
     * @ORM\Column(name="white_list", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $WhiteList;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\User", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="mail_user_id", referencedColumnName="id")
     */
    protected $MailUser;
    /**
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @var
     * @Gedmo\Versioned
     */
    protected $Email;
    /**
     * @ORM\Column(name="priority", type="integer", precision=3, nullable=false, options={"default"=5})
     * @var integer
     * @Gedmo\Versioned
     */
    protected $Priority;

    /**
     * @return boolean
     */
    public function isBlackList()
    {
        return $this->BlackList;
    }

    /**
     * @param boolean $BlackList
     * @return $this
     */
    public function setBlackList($BlackList)
    {
        $this->BlackList = $BlackList;
        $this->WhiteList = false;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWhiteList()
    {
        return $this->WhiteList;
    }

    /**
     * @param boolean $WhiteList
     * @return $this
     */
    public function setWhiteList($WhiteList)
    {
        $this->WhiteList = $WhiteList;
        $this->BlackList = false;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMailUser()
    {
        return $this->MailUser;
    }

    /**
     * @param mixed $MailUser
     * @return $this
     */
    public function setMailUser($MailUser)
    {
        $this->MailUser = $MailUser;
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

}