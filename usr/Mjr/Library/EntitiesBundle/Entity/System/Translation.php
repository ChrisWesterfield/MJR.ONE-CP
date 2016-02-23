<?php


namespace Mjr\Library\EntitiesBundle\Entity\System;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;


/**
 * @ORM\Table(name="system_translation", uniqueConstraints={@ORM\UniqueConstraint(name="locale_idenity", columns={"locale", "idenity"})})
 * @ORM\Entity()
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\System
 * @author Chris Westerfield <chris@mjr.one>
 */
class Translation
{
    use IdTrait;
    use serializeTrait;
    /**
     * @ORM\Column(name="locale", type="string", length=10, nullable=false)
     * @var string
     */
    protected $Locale;
    /**
     * @ORM\Column(name="idenity", type="string", length=200)
     * @var string
     */
    protected $Identity;
    /**
     * @ORM\Column(name="translation", type="text", nullable=true)
     * @var string
     */
    protected $Translation;

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->Locale;
    }

    /**
     * @param string $Locale
     * @return $this
     */
    public function setLocale($Locale)
    {
        $this->Locale = $Locale;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->Identity;
    }

    /**
     * @param string $Identity
     * @return $this
     */
    public function setIdentity($Identity)
    {
        $this->Identity = $Identity;
        return $this;
    }

    /**
     * @return string
     */
    public function getTranslation()
    {
        return $this->Translation;
    }

    /**
     * @param string $Translation
     * @return $this
     */
    public function setTranslation($Translation)
    {
        $this->Translation = $Translation;
        return $this;
    }
}