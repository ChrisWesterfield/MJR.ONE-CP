<?php


namespace Mjr\Library\EntitiesBundle\Entity\Mail;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="mail_filter_user")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class FilterUser
{
    use IdTrait;
    use SystemUserTrait;
    use SystemGroupTrait;
    use LogableTrait;
    use ActiveTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\User", inversedBy="MailFilters", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="mail_user_id", referencedColumnName="id", nullable=false)
     * @var User
     */
    protected $MailUser;
    /**
     * @ORM\Column(name="rule_name", type="string", length=64, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $RuleName;
    /**
     * @ORM\Column(name="source", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Source;
    /**
     * @ORM\Column(name="search_term", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $SearchTerm;
    /**
     * @ORM\Column(name="op", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Op;
    /**
     * @ORM\Column(name="action", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Action;
    /**
     * @ORM\Column(name="target", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Target;

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
     * @return string
     */
    public function getRuleName()
    {
        return $this->RuleName;
    }

    /**
     * @param string $RuleName
     * @return $this
     */
    public function setRuleName($RuleName)
    {
        $this->RuleName = $RuleName;
        return $this;
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
    public function getSearchTerm()
    {
        return $this->SearchTerm;
    }

    /**
     * @param string $SearchTerm
     * @return $this
     */
    public function setSearchTerm($SearchTerm)
    {
        $this->SearchTerm = $SearchTerm;
        return $this;
    }

    /**
     * @return string
     */
    public function getOp()
    {
        return $this->Op;
    }

    /**
     * @param string $Op
     * @return $this
     */
    public function setOp($Op)
    {
        $this->Op = $Op;
        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->Action;
    }

    /**
     * @param string $Action
     * @return $this
     */
    public function setAction($Action)
    {
        $this->Action = $Action;
        return $this;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->Target;
    }

    /**
     * @param string $Target
     * @return $this
     */
    public function setTarget($Target)
    {
        $this->Target = $Target;
        return $this;
    }
}