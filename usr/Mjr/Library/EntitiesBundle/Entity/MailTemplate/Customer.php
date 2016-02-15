<?php

namespace Mjr\Library\EntitiesBundle\Entity\MailTemplate;
use Doctrine\Common\Collections\ArrayCollection;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;

/**
 * @ORM\Table(name="template_mail_customer")
 * @Gedmo\TranslationEntity(class="\Mjr\Library\EntitiesBundle\Entity\MailTemplate\Translation")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\MailTemplate
 * @author Chris Westerfield <chris@mjr.one>
 */
class Customer
{
    use serializeTrait;
    use LogableTrait;
    use SystemGroupTrait;
    use SystemUserTrait;
    use IdTrait;

    /**
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $type;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $name;
    /**
     * @Gedmo\Translatable
     * @ORM\Column(name="subject", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $subject;
    /**
     * @Gedmo\Translatable
     * @ORM\Column(name="message", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $message;
    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    protected $locale;

    /**
     * @ORM\OneToMany(
     *   targetEntity="Mjr\Library\EntitiesBundle\Entity\MailTemplate\Translation",
     *   mappedBy="object",
     *   cascade={"persist", "remove"}
     * )
     * @var ArrayCollection
     */
    protected $translations;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    /**
     * @param Translation $translation
     */
    public function addTranslation(Translation $translation)
    {
        if (!$this->translations->contains($translation))
        {
            $translation->setObject($this);
            $this->translations->add($translation);
        }
    }

    /**
     * @param Translation $translation
     * @return bool
     */
    public function removeTranslation(Translation $translation)
    {
        if($this->hasTranslation($translation))
        {
            $this->translations->removeElement($translation);
            return true;
        }
        return false;
    }

    /**
     * @param Translation $translation
     * @return bool
     */
    public function hasTranslation(Translation $translation)
    {
        return $this->translations->contains($translation);
    }

    /**
     * @return ArrayCollection
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

}