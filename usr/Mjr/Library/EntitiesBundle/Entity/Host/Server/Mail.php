<?php

    namespace Mjr\Library\EntitiesBundle\Entity\Host\Server;
    use Mjr\Library\EntitiesBundle\Entity\Host\Main;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\serializeTrait;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;


    /**
     * @ORM\Table(name="host_config_mail")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\System\Server
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Mail
    {
        use LogableTrait;
        use serializeTrait;
        /**
         * @var integer
         * @ORM\Column(name="id", type="integer", nullable=false)
         * @ORM\Id
         */
        protected $Id;
        /**
         * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Host\Main", fetch="EXTRA_LAZY", inversedBy="ConfigMail")
         * @ORM\JoinColumn(name="id", referencedColumnName="id")
         * @var Main
         */
        protected $Server;
        /**
         * @ORM\Column(name="get_mail_config_dir", type="string", length=255, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $GetMailConfigDir;
        /**
         * @ORM\Column(name="modul", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $Modul;
        /**
         * @ORM\Column(name="mail_directory_path", type="string", length=255, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $MailDirectoryPath;
        /**
         * @ORM\Column(name="mail_directory_format", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $MailDirectoryFormat;
        /**
         * @ORM\Column(name="home_directory_path", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $HomeDirectoryPath;
        /**
         * @ORM\Column(name="dkim_path", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $DkimPath;
        /**
         * @ORM\Column(name="dkim_strength", type="string", length=255, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $DkimStrength;
        /**
         * @ORM\Column(name="mail_server_daemon", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $MailServerDaemon;
        /**
         * @ORM\Column(name="mail_filter_syntax", type="string", length=128, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $MailFilterSyntax;
        /**
         * @ORM\Column(name="mail_user_id", type="string", length=10, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $MailUserId;
        /**
         * @ORM\Column(name="mail_user_group", type="string", length=10, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $MailUserGroup;
        /**
         * @ORM\Column(name="use_websites_linux_uid_for_mailbox", type="boolean", nullable=false, options={"default"=false})
         * @Gedmo\Versioned()
         * @var bool
         */
        protected $UseWebsitesLinuxUidForMailbox;
        /**
         * @ORM\Column(name="relay_host", type="string", length=255, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $RelayHost;
        /**
         * @ORM\Column(name="relay_host_user", type="string", length=255, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $RelayHostUser;
        /**
         * @ORM\Column(name="relay_host_password", type="string", length=80, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $RelayHostPassword;
        /**
         * @ORM\Column(name="reject_sender_and_login_mismatch", type="boolean", nullable=false, options={"default"=false})
         * @Gedmo\Versioned()
         * @var bool
         */
        protected $RejectSenderAndLoginMismatch;
        /**
         * @ORM\Column(name="mailbox_size_limit", type="bigint", nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $MailboxSizeLimit;
        /**
         * @ORM\Column(name="message_size_limit", type="bigint", nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $MessageSizeLimit;
        /**
         * @ORM\Column(name="mail_box_quota_statistics", type="boolean", nullable=false, options={"default"=false})
         * @Gedmo\Versioned()
         * @var bool
         */
        protected $MailBoxQuotaStatistics;
        /**
         * @ORM\Column(name="real_time_black_hole_list", type="string", length=255, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $RealTimeBlackHoleList;
        /**
         * @ORM\Column(name="send_quota_warnings_to_admin", type="boolean", nullable=false, options={"default"=false})
         * @Gedmo\Versioned()
         * @var bool
         */
        protected $SendQuotaWarningsToAdmin;
        /**
         * @ORM\Column(name="send_quota_warning_to_client", type="boolean", nullable=false, options={"default"=false})
         * @Gedmo\Versioned()
         * @var bool
         */
        protected $SendQuotaWarningToClient;
        /**
         * @ORM\Column(name="send_quota_warning_each_days", type="string", length=5, nullable=true)
         * @Gedmo\Versioned()
         * @var string
         */
        protected $SendQuotaWarningEachDays;
        /**
         * @ORM\Column(name="send_quota_ok_message_to_client", type="boolean", nullable=false, options={"default"=false})
         * @Gedmo\Versioned()
         * @var bool
         */
        protected $SendQuotaOkMessageToClient;

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
         * @return string
         */
        public function getGetMailConfigDir()
        {
            return $this->GetMailConfigDir;
        }

        /**
         * @param string $GetMailConfigDir
         * @return $this
         */
        public function setGetMailConfigDir($GetMailConfigDir)
        {
            $this->GetMailConfigDir = $GetMailConfigDir;
            return $this;
        }

        /**
         * @return string
         */
        public function getModul()
        {
            return $this->Modul;
        }

        /**
         * @param string $Modul
         * @return $this
         */
        public function setModul($Modul)
        {
            $this->Modul = $Modul;
            return $this;
        }

        /**
         * @return string
         */
        public function getMailDirectoryPath()
        {
            return $this->MailDirectoryPath;
        }

        /**
         * @param string $MailDirectoryPath
         * @return $this
         */
        public function setMailDirectoryPath($MailDirectoryPath)
        {
            $this->MailDirectoryPath = $MailDirectoryPath;
            return $this;
        }

        /**
         * @return string
         */
        public function getMailDirectoryFormat()
        {
            return $this->MailDirectoryFormat;
        }

        /**
         * @param string $MailDirectoryFormat
         * @return $this
         */
        public function setMailDirectoryFormat($MailDirectoryFormat)
        {
            $this->MailDirectoryFormat = $MailDirectoryFormat;
            return $this;
        }

        /**
         * @return string
         */
        public function getDkimPath()
        {
            return $this->DkimPath;
        }

        /**
         * @param string $DkimPath
         * @return $this
         */
        public function setDkimPath($DkimPath)
        {
            $this->DkimPath = $DkimPath;
            return $this;
        }

        /**
         * @return string
         */
        public function getDkimStrength()
        {
            return $this->DkimStrength;
        }

        /**
         * @param string $DkimStrength
         * @return $this
         */
        public function setDkimStrength($DkimStrength)
        {
            $this->DkimStrength = $DkimStrength;
            return $this;
        }

        /**
         * @return string
         */
        public function getMailServerDaemon()
        {
            return $this->MailServerDaemon;
        }

        /**
         * @param string $MailServerDaemon
         * @return $this
         */
        public function setMailServerDaemon($MailServerDaemon)
        {
            $this->MailServerDaemon = $MailServerDaemon;
            return $this;
        }

        /**
         * @return string
         */
        public function getMailFilterSyntax()
        {
            return $this->MailFilterSyntax;
        }

        /**
         * @param string $MailFilterSyntax
         * @return $this
         */
        public function setMailFilterSyntax($MailFilterSyntax)
        {
            $this->MailFilterSyntax = $MailFilterSyntax;
            return $this;
        }

        /**
         * @return string
         */
        public function getMailUserId()
        {
            return $this->MailUserId;
        }

        /**
         * @param string $MailUserId
         * @return $this
         */
        public function setMailUserId($MailUserId)
        {
            $this->MailUserId = $MailUserId;
            return $this;
        }

        /**
         * @return string
         */
        public function getMailUserGroup()
        {
            return $this->MailUserGroup;
        }

        /**
         * @param string $MailUserGroup
         * @return $this
         */
        public function setMailUserGroup($MailUserGroup)
        {
            $this->MailUserGroup = $MailUserGroup;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isUseWebsitesLinuxUidForMailbox()
        {
            return $this->UseWebsitesLinuxUidForMailbox;
        }

        /**
         * @param boolean $UseWebsitesLinuxUidForMailbox
         * @return $this
         */
        public function setUseWebsitesLinuxUidForMailbox($UseWebsitesLinuxUidForMailbox)
        {
            $this->UseWebsitesLinuxUidForMailbox = $UseWebsitesLinuxUidForMailbox;
            return $this;
        }

        /**
         * @return string
         */
        public function getRelayHost()
        {
            return $this->RelayHost;
        }

        /**
         * @param string $RelayHost
         * @return $this
         */
        public function setRelayHost($RelayHost)
        {
            $this->RelayHost = $RelayHost;
            return $this;
        }

        /**
         * @return string
         */
        public function getRelayHostUser()
        {
            return $this->RelayHostUser;
        }

        /**
         * @param string $RelayHostUser
         * @return $this
         */
        public function setRelayHostUser($RelayHostUser)
        {
            $this->RelayHostUser = $RelayHostUser;
            return $this;
        }

        /**
         * @return string
         */
        public function getRelayHostPassword()
        {
            return $this->RelayHostPassword;
        }

        /**
         * @param string $RelayHostPassword
         * @return $this
         */
        public function setRelayHostPassword($RelayHostPassword)
        {
            $this->RelayHostPassword = $RelayHostPassword;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isRejectSenderAndLoginMismatch()
        {
            return $this->RejectSenderAndLoginMismatch;
        }

        /**
         * @param boolean $RejectSenderAndLoginMismatch
         * @return $this
         */
        public function setRejectSenderAndLoginMismatch($RejectSenderAndLoginMismatch)
        {
            $this->RejectSenderAndLoginMismatch = $RejectSenderAndLoginMismatch;
            return $this;
        }

        /**
         * @return string
         */
        public function getMailboxSizeLimit()
        {
            return $this->MailboxSizeLimit;
        }

        /**
         * @param string $MailboxSizeLimit
         * @return $this
         */
        public function setMailboxSizeLimit($MailboxSizeLimit)
        {
            $this->MailboxSizeLimit = $MailboxSizeLimit;
            return $this;
        }

        /**
         * @return string
         */
        public function getMessageSizeLimit()
        {
            return $this->MessageSizeLimit;
        }

        /**
         * @param string $MessageSizeLimit
         * @return $this
         */
        public function setMessageSizeLimit($MessageSizeLimit)
        {
            $this->MessageSizeLimit = $MessageSizeLimit;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isMailBoxQuotaStatistics()
        {
            return $this->MailBoxQuotaStatistics;
        }

        /**
         * @param boolean $MailBoxQuotaStatistics
         * @return $this
         */
        public function setMailBoxQuotaStatistics($MailBoxQuotaStatistics)
        {
            $this->MailBoxQuotaStatistics = $MailBoxQuotaStatistics;
            return $this;
        }

        /**
         * @return string
         */
        public function getRealTimeBlackHoleList()
        {
            return $this->RealTimeBlackHoleList;
        }

        /**
         * @param string $RealTimeBlackHoleList
         * @return $this
         */
        public function setRealTimeBlackHoleList($RealTimeBlackHoleList)
        {
            $this->RealTimeBlackHoleList = $RealTimeBlackHoleList;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isSendQuotaWarningsToAdmin()
        {
            return $this->SendQuotaWarningsToAdmin;
        }

        /**
         * @param boolean $SendQuotaWarningsToAdmin
         * @return $this
         */
        public function setSendQuotaWarningsToAdmin($SendQuotaWarningsToAdmin)
        {
            $this->SendQuotaWarningsToAdmin = $SendQuotaWarningsToAdmin;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isSendQuotaWarningToClient()
        {
            return $this->SendQuotaWarningToClient;
        }

        /**
         * @param boolean $SendQuotaWarningToClient
         * @return $this
         */
        public function setSendQuotaWarningToClient($SendQuotaWarningToClient)
        {
            $this->SendQuotaWarningToClient = $SendQuotaWarningToClient;
            return $this;
        }

        /**
         * @return string
         */
        public function getSendQuotaWarningEachDays()
        {
            return $this->SendQuotaWarningEachDays;
        }

        /**
         * @param string $SendQuotaWarningEachDays
         * @return $this
         */
        public function setSendQuotaWarningEachDays($SendQuotaWarningEachDays)
        {
            $this->SendQuotaWarningEachDays = $SendQuotaWarningEachDays;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isSendQuotaOkMessageToClient()
        {
            return $this->SendQuotaOkMessageToClient;
        }

        /**
         * @param boolean $SendQuotaOkMessageToClient
         * @return $this
         */
        public function setSendQuotaOkMessageToClient($SendQuotaOkMessageToClient)
        {
            $this->SendQuotaOkMessageToClient = $SendQuotaOkMessageToClient;
            return $this;
        }

        /**
         * @return string
         */
        public function getHomeDirectoryPath()
        {
            return $this->HomeDirectoryPath;
        }

        /**
         * @param string $HomeDirectoryPath
         * @return $this
         */
        public function setHomeDirectoryPath($HomeDirectoryPath)
        {
            $this->HomeDirectoryPath = $HomeDirectoryPath;
            return $this;
        }

    }