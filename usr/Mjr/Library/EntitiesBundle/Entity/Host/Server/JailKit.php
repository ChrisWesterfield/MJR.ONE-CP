<?php

namespace Mjr\Library\EntitiesBundle\Entity\Host\Server;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;

/**
 * @ORM\Table(name="host_config_jailkit")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\System\Server
 * @author Chris Westerfield <chris@mjr.one>
 */
class JailKit
{
    use serializeTrait;
    use LogableTrait;
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     */
    protected $Id;
    /**
     * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY", inversedBy="ConfigJailKit")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @var Main
     */
    protected $Server;
    /**
     * @ORM\Column(name="chroot_home", type="string", length=255, nullable=true)
     * @var string
     */
    protected $ChrootHome;
    /**
     * @ORM\Column(name="chroot_app_sections", type="text", nullable=true)
     * @var string
     */
    protected $ChrootAppSections;
    /**
     * @ORM\Column(name="chrooted_applications", type="text", nullable=true)
     * @var string
     */
    protected $ChrootedApplications;
    /**
     * @ORM\Column(name="chrooted_cron_applications", type="text", nullable=true)
     * @var string
     */
    protected $ChrootedCronApplications;

    /**
     * @return Main
     */
    public function getServer()
    {
        return $this->Server;
    }

    /**
     * @param Main $Server
     * @return $this
     */
    public function setServer($Server)
    {
        $this->Server = $Server;
        return $this;
    }

    /**
     * @return string
     */
    public function getChrootHome()
    {
        return $this->ChrootHome;
    }

    /**
     * @param string $ChrootHome
     * @return $this
     */
    public function setChrootHome($ChrootHome)
    {
        $this->ChrootHome = $ChrootHome;
        return $this;
    }

    /**
     * @return string
     */
    public function getChrootAppSections()
    {
        return $this->ChrootAppSections;
    }

    /**
     * @param string $ChrootAppSections
     * @return $this
     */
    public function setChrootAppSections($ChrootAppSections)
    {
        $this->ChrootAppSections = $ChrootAppSections;
        return $this;
    }

    /**
     * @return string
     */
    public function getChrootedApplications()
    {
        return $this->ChrootedApplications;
    }

    /**
     * @param string $ChrootedApplications
     * @return $this
     */
    public function setChrootedApplications($ChrootedApplications)
    {
        $this->ChrootedApplications = $ChrootedApplications;
        return $this;
    }

    /**
     * @return string
     */
    public function getChrootedCronApplications()
    {
        return $this->ChrootedCronApplications;
    }

    /**
     * @param string $ChrootedCronApplications
     * @return $this
     */
    public function setChrootedCronApplications($ChrootedCronApplications)
    {
        $this->ChrootedCronApplications = $ChrootedCronApplications;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     * @return $this
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

}