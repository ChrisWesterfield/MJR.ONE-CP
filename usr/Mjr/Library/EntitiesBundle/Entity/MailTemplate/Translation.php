<?php

namespace Mjr\Library\EntitiesBundle\Entity\MailTemplate;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="template_mail_customer_translation")
 * @ORM\Entity()
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\MailTemplate
 * @author Chris Westerfield <chris@mjr.one>
 * @Gedmo\Loggable( )
 */
class Translation
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\Column(name="locale", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $locale;
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
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\MailTemplate\Customer", inversedBy="translations", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="template_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
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
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     * @return $this
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }
}