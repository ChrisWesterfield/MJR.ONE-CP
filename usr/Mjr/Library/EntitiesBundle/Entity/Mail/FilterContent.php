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
 * @ORM\Table(name="mail_filter_content")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Mail
 * @author Chris Westerfield <chris@mjr.one>
 */
class FilterContent
{
    use IdTrait;
    use LogableTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use ServerTrait;
    use ActiveTrait;
    /**
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;
    /**
     * @ORM\Column(name="pattern", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Pattern;
    /**
     * @ORM\Column(name="data", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Data;
    /**
     * @ORM\Column(name="action", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Action;

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
    public function getPattern()
    {
        return $this->Pattern;
    }

    /**
     * @param string $Pattern
     * @return $this
     */
    public function setPattern($Pattern)
    {
        $this->Pattern = $Pattern;
        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->Data;
    }

    /**
     * @param string $Data
     * @return $this
     */
    public function setData($Data)
    {
        $this->Data = $Data;
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
}