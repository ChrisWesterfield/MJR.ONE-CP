<?php

namespace Mjr\Library\EntitiesBundle\Entity\Dns;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="dns_tsigkeys")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Dns
 * @author Chris Westerfield <chris@mjr.one>
 */
class TSigKeys
{
    use IdTrait;
    use LogableTrait;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="algorithm", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Algorithm;
    /**
     * @ORM\Column(name="secret", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Secret;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return $this
     */
    public function setName($Name)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->Algorithm;
    }

    /**
     * @param string $Algorithm
     * @return $this
     */
    public function setAlgorithm($Algorithm)
    {
        $this->Algorithm = $Algorithm;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->Secret;
    }

    /**
     * @param string $Secret
     * @return $this
     */
    public function setSecret($Secret)
    {
        $this->Secret = $Secret;
        return $this;
    }
}