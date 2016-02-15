<?php


namespace Mjr\Library\EntitiesBundle\Entity\Mail;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;

/**
 * @ORM\Table(name="mail_traffic")
 * @ORM\Entity()
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class Traffic
{
    use IdTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\User", inversedBy="MailFilters", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="mail_user_id", referencedColumnName="id", nullable=false)
     * @var User
     */
    protected $MailUser;
    /**
     * @ORM\Column(name="month", type="datetime", nullable=false)
     * @var integer
     */
    protected $Month;
    /**
     * @ORM\Column(name="traffic", type="bigint", nullable=false, options={"default"=0, "unsigned"=false})
     * @var integer
     */
    protected $Traffic;

    /**
     * @return User
     */
    public function getMailUser()
    {
        return $this->MailUser;
    }

    /**
     * @param User $MailUser
     * @return $this
     */
    public function setMailUser($MailUser)
    {
        $this->MailUser = $MailUser;
        return $this;
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->Month;
    }

    /**
     * @param int $Month
     * @return $this
     */
    public function setMonth($Month)
    {
        $this->Month = $Month;
        return $this;
    }

    /**
     * @return int
     */
    public function getTraffic()
    {
        return $this->Traffic;
    }

    /**
     * @param int $Traffic
     * @return $this
     */
    public function setTraffic($Traffic)
    {
        $this->Traffic = $Traffic;
        return $this;
    }
}