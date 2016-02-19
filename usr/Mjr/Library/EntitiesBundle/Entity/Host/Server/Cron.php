<?php

namespace Mjr\Library\EntitiesBundle\Entity\Host\Server;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;

/**
 * @ORM\Table(name="host_config_cron")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\System\Server
 * @author Chris Westerfield <chris@mjr.one>
 */
class Cron
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
     * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY", inversedBy="ConfigCron")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @var Main
     */
    protected $Server;
    /**
     * @ORM\Column(name="cron_init_script_name", type="string", length=255, nullable=true)
     * @var string
     */
    protected $CronInitScriptName;
    /**
     * @ORM\Column(name="path_for_individual_cron_tabs", type="string", length=255, nullable=true)
     * @var string
     */
    protected $PathForIndividualCronTabs;
    /**
     * @ORM\Column(name="path_to_wget_programm", type="string", length=255, nullable=true)
     * @var string
     */
    protected $PathToWgetProgramm;

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
    public function getCronInitScriptName()
    {
        return $this->CronInitScriptName;
    }

    /**
     * @param string $CronInitScriptName
     * @return $this
     */
    public function setCronInitScriptName($CronInitScriptName)
    {
        $this->CronInitScriptName = $CronInitScriptName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPathForIndividualCronTabs()
    {
        return $this->PathForIndividualCronTabs;
    }

    /**
     * @param string $PathForIndividualCronTabs
     * @return $this
     */
    public function setPathForIndividualCronTabs($PathForIndividualCronTabs)
    {
        $this->PathForIndividualCronTabs = $PathForIndividualCronTabs;
        return $this;
    }

    /**
     * @return string
     */
    public function getPathToWgetProgramm()
    {
        return $this->PathToWgetProgramm;
    }

    /**
     * @param string $PathToWgetProgramm
     * @return $this
     */
    public function setPathToWgetProgramm($PathToWgetProgramm)
    {
        $this->PathToWgetProgramm = $PathToWgetProgramm;
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