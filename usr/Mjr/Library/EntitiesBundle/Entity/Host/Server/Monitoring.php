<?php

namespace Mjr\Library\EntitiesBundle\Entity\Host\Server;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Host\Main;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;

/**
 * @ORM\Table(name="host_config_monitoring")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\System\Server
 * @author Chris Westerfield <chris@mjr.one>
 */
class Monitoring
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
     * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY", inversedBy="ConfigMonitoring")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     * @var Main
     */
    protected $Server;
    /**
     * @ORM\Column(name="enable_service_monitoring_and_restart_on_failure", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $EnableServiceMonitoringAndRestartOnFailure;
    /**
     * @ORM\Column(name="disable_httpd_monitoring", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $DisableHttpdMonitoring;
    /**
     * @ORM\Column(name="disable_mongo_db_monioring", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $DisableMongoDbMonioring;
    /**
     * @ORM\Column(name="disable_my_sqlmonitoring", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $DisableMySQLMonitoring;
    /**
     * @ORM\Column(name="disable_postgresql_monitoring", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $DisablePostgresqlMonitoring;
    /**
     * @ORM\Column(name="disable_ftp_daemon_monitoring", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $DisableFtpDaemonMonitoring;
    /**
     * @ORM\Column(name="disable_ssh_monitoring", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $DisableSshMonitoring;
    /**
     * @ORM\Column(name="disable_smtpmonitoring", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $DisableSMTPMonitoring;
    /**
     * @ORM\Column(name="disable_mail_deamon_monitoring", type="boolean", nullable=false, options={"default"=false})
     * @Gedmo\Versioned()
     * @var bool
     */
    protected $DisableMailDeamonMonitoring;

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
     * @return boolean
     */
    public function isEnableServiceMonitoringAndRestartOnFailure()
    {
        return $this->EnableServiceMonitoringAndRestartOnFailure;
    }

    /**
     * @param boolean $EnableServiceMonitoringAndRestartOnFailure
     * @return $this
     */
    public function setEnableServiceMonitoringAndRestartOnFailure($EnableServiceMonitoringAndRestartOnFailure)
    {
        $this->EnableServiceMonitoringAndRestartOnFailure = $EnableServiceMonitoringAndRestartOnFailure;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableHttpdMonitoring()
    {
        return $this->DisableHttpdMonitoring;
    }

    /**
     * @param boolean $DisableHttpdMonitoring
     * @return $this
     */
    public function setDisableHttpdMonitoring($DisableHttpdMonitoring)
    {
        $this->DisableHttpdMonitoring = $DisableHttpdMonitoring;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableMongoDbMonioring()
    {
        return $this->DisableMongoDbMonioring;
    }

    /**
     * @param boolean $DisableMongoDbMonioring
     * @return $this
     */
    public function setDisableMongoDbMonioring($DisableMongoDbMonioring)
    {
        $this->DisableMongoDbMonioring = $DisableMongoDbMonioring;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableMySQLMonitoring()
    {
        return $this->DisableMySQLMonitoring;
    }

    /**
     * @param boolean $DisableMySQLMonitoring
     * @return $this
     */
    public function setDisableMySQLMonitoring($DisableMySQLMonitoring)
    {
        $this->DisableMySQLMonitoring = $DisableMySQLMonitoring;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisablePostgresqlMonitoring()
    {
        return $this->DisablePostgresqlMonitoring;
    }

    /**
     * @param boolean $DisablePostgresqlMonitoring
     * @return $this
     */
    public function setDisablePostgresqlMonitoring($DisablePostgresqlMonitoring)
    {
        $this->DisablePostgresqlMonitoring = $DisablePostgresqlMonitoring;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableFtpDaemonMonitoring()
    {
        return $this->DisableFtpDaemonMonitoring;
    }

    /**
     * @param boolean $DisableFtpDaemonMonitoring
     * @return $this
     */
    public function setDisableFtpDaemonMonitoring($DisableFtpDaemonMonitoring)
    {
        $this->DisableFtpDaemonMonitoring = $DisableFtpDaemonMonitoring;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableSshMonitoring()
    {
        return $this->DisableSshMonitoring;
    }

    /**
     * @param boolean $DisableSshMonitoring
     * @return $this
     */
    public function setDisableSshMonitoring($DisableSshMonitoring)
    {
        $this->DisableSshMonitoring = $DisableSshMonitoring;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableSMTPMonitoring()
    {
        return $this->DisableSMTPMonitoring;
    }

    /**
     * @param boolean $DisableSMTPMonitoring
     * @return $this
     */
    public function setDisableSMTPMonitoring($DisableSMTPMonitoring)
    {
        $this->DisableSMTPMonitoring = $DisableSMTPMonitoring;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisableMailDeamonMonitoring()
    {
        return $this->DisableMailDeamonMonitoring;
    }

    /**
     * @param boolean $DisableMailDeamonMonitoring
     * @return $this
     */
    public function setDisableMailDeamonMonitoring($DisableMailDeamonMonitoring)
    {
        $this->DisableMailDeamonMonitoring = $DisableMailDeamonMonitoring;
        return $this;
    }

}