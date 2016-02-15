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
 * @ORM\Table(name="mail_access")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class Access
{
    use IdTrait;
    use SystemUserTrait;
    use SystemGroupTrait;
    use ServerTrait;
    use ActiveTrait;
    private $allowedValues = array(
        'recipient','sender','client'
    );
    /**
     * @ORM\Column(name="source", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Source;
    /**
     * @ORM\Column(name="access", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Access;
    /**
     * @ORM\Column(name="type", type="string", length=10, nullable=false, options={"default"="recipient"})
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;

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
        if(!in_array($Type,$this->allowedValues))
        {
            $Type = 'recipient';
        }
        $this->Type = $Type;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedValues()
    {
        return $this->allowedValues;
    }
}