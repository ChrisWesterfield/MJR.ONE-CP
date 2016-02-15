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
 * @ORM\Table(name="mail_relay_recipient")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class RelayRecipient
{
    use IdTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ServerTrait;
    use ActiveTrait;
    /**
     * @ORM\Column(name="source", length=255, type="string", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Source;
    /**
     * @ORM\Column(name="access", length=255, type="string", nullable=false, options={"default"="OK"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $Access;

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
    public function getAccess()
    {
        return $this->Access;
    }

    /**
     * @param string $Access
     * @return $this
     */
    public function setAccess($Access)
    {
        $this->Access = $Access;
        return $this;
    }
}