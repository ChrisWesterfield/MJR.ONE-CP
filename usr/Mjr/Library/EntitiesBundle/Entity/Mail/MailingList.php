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
 * @ORM\Table(name="mail_mailling_list")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class MaillingList
{
    use IdTrait;
    use ServerTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ActiveTrait;
    use LogableTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Mail\Domain", inversedBy="MaillingLists", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id", nullable=false)
     * @var Domain
     */
    protected $Domain;
    /**
     * @ORM\Column(name="listname", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Listname;
    /**
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Email;
    /**
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Password;

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
    public function getListname()
    {
        return $this->Listname;
    }

    /**
     * @param string $Listname
     * @return $this
     */
    public function setListname($Listname)
    {
        $this->Listname = $Listname;
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