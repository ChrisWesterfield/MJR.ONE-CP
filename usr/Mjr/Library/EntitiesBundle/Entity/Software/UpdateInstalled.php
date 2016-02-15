<?php

namespace Mjr\Library\EntitiesBundle\Entity\Software;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\ServerTrait;

/**
 * @ORM\Table(name="software_update_installed")
 * @ORM\Entity()
 * @Gedmo\Loggable()
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Software
 * @author Chris Westerfield <chris@mjr.one>
 */
class UpdateInstalled
{
    use IdTrait;
    use ServerTrait;
    /**
     * @ORM\ManyToOne(targetEntity="Repository", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="repository_id", referencedColumnName="id")
     */
    protected $Repository;
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Software\Update", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="update_id", referencedColumnName="id")
     */
    protected $Update;
    /**
     * @ORM\Column(name="status", type="string", length=16, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Status;

    /**
     * @return mixed
     */
    public function getRepository()
    {
        return $this->Repository;
    }

    /**
     * @param mixed $Repository
     * @return $this
     */
    public function setRepository($Repository)
    {
        $this->Repository = $Repository;
        return $this;
    }

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
     * @return mixed
     */
    public function getUpdate()
    {
        return $this->Update;
    }

    /**
     * @param mixed $Update
     * @return $this
     */
    public function setUpdate($Update)
    {
        $this->Update = $Update;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param string $Status
     * @return $this
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
        return $this;
    }
}