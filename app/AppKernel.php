<?php

use Ambta\DoctrineEncryptBundle\AmbtaDoctrineEncryptBundle;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle;
use FOS\ElasticaBundle\FOSElasticaBundle;
use FOS\RestBundle\FOSRestBundle;
use Knp\Bundle\MenuBundle\KnpMenuBundle;
use Mjr\ApiBundle\MjrApiBundle;
use Mjr\Frontend\APSBundle\MjrFrontendAPSBundle;
use Mjr\Frontend\ClientBundle\MjrFrontendClientBundle;
use Mjr\Frontend\DashboardBundle\MjrFrontendDashboardBundle;
use Mjr\Frontend\DNSBundle\MjrFrontendDNSBundle;
use Mjr\Frontend\Email\AccountsBundle\MjrFrontendEmailAccountsBundle;
use Mjr\Frontend\Email\FetchmailBundle\MjrFrontendEmailFetchmailBundle;
use Mjr\Frontend\Email\FiltersBundle\MjrFrontendEmailFiltersBundle;
use Mjr\Frontend\Email\ListBundle\MjrFrontendEmailListBundle;
use Mjr\Frontend\Email\SpamBundle\MjrFrontendEmailSpamBundle;
use Mjr\Frontend\Email\XmppBundle\MjrFrontendEmailXmppBundle;
use Mjr\Frontend\HelpBundle\MjrFrontendHelpBundle;
use Mjr\Frontend\MessageBundle\MjrFrontendMessageBundle;
use Mjr\Frontend\Monitoring\CPBundle\MjrFrontendMonitoringCPBundle;
use Mjr\Frontend\Monitoring\LogBundle\MjrFrontendMonitoringLogBundle;
use Mjr\Frontend\Monitoring\ServerBundle\MjrFrontendMonitoringServerBundle;
use Mjr\Frontend\OperationsBundle\MjrFrontendOperationsBundle;
use Mjr\Frontend\ResellerBundle\MjrFrontendResellerBundle;
use Mjr\Frontend\Sites\AccessBundle\MjrFrontendSitesAccessBundle;
use Mjr\Frontend\Sites\CronBundle\MjrFrontendSitesCronBundle;
use Mjr\Frontend\Sites\DatabaseBundle\MjrFrontendSitesDatabaseBundle;
use Mjr\Frontend\Sites\ShellBundle\MjrFrontendSitesShellBundle;
use Mjr\Frontend\Sites\WebBundle\MjrFrontendSitesWebBundle;
use Mjr\Frontend\StatisticsBundle\MjrFrontendStatisticsBundle;
use Mjr\Frontend\SupportBundle\MjrFrontendSupportBundle;
use Mjr\Frontend\System\APSBundle\MjrFrontendSystemAPSBundle;
use Mjr\Frontend\System\ConfigBundle\MjrFrontendSystemConfigBundle;
use Mjr\Frontend\System\RemoteBundle\MjrFrontendSystemRemoteBundle;
use Mjr\Frontend\System\UserBundle\MjrFrontendSystemUserBundle;
use Mjr\Frontend\ToolsBundle\MjrFrontendToolsBundle;
use Mjr\Frontend\vServerBundle\MjrFrontendvServerBundle;
use Mjr\Library\BillingBundle\MjrLibraryBillingBundle;
use Mjr\Library\ControllerBundle\MjrLibraryControllerBundle;
use Mjr\Library\EntitiesBundle\MjrLibraryEntitiesBundle;
use Mjr\Library\ErrbitBundle\MjrLibraryErrbitBundle;
use Mjr\Library\ProfilerBundle\MjrLibraryProfilerBundle;
use Mjr\Library\ToolsBundle\MjrLibraryToolsBundle;
use Mjr\Server\BackupBundle\MjrServerBackupBundle;
use Mjr\Server\ClientBundle\MjrServerClientBundle;
use Mjr\Server\CronBundle\MjrServerCronBundle;
use Mjr\Server\DatabaseBundle\MjrServerDatabaseBundle;
use Mjr\Server\DnsBundle\MjrServerDnsBundle;
use Mjr\Server\MailBundle\MjrServerMailBundle;
use Mjr\Server\MonitorBundle\MjrServerMonitorBundle;
use Mjr\Server\RemoteBundle\MjrServerRemoteBundle;
use Mjr\Server\RescueBundle\MjrServerRescueBundle;
use Mjr\Server\ServerBundle\MjrServerServerBundle;
use Mjr\Server\SupportBundle\MjrServerSupportBundle;
use Mjr\Server\VMBundle\MjrServerVMBundle;
use Mjr\Server\WebBundle\MjrServerWebBundle;
use Mjr\Server\XMPPBundle\MjrServerXMPPBundle;
use Mjr\Theme\AdminLTEBundle\MjrThemeAdminLTEBundle;
use Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle;
use Nelmio\ApiDocBundle\NelmioApiDocBundle;
use R\U2FTwoFactorBundle\RU2FTwoFactorBundle;
use Scheb\TwoFactorBundle\SchebTwoFactorBundle;
use Sensio\Bundle\DistributionBundle\SensioDistributionBundle;
use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle;
use Snc\RedisBundle\SncRedisBundle;
use Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle;
use Symfony\Bundle\AsseticBundle\AsseticBundle;
use Symfony\Bundle\DebugBundle\DebugBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    /**
     * process bundles and add them to the registry
     * @param $bundles
     * @param array $registry
     */
    protected function addRegisteredBundles($bundles,&$registry=array())
    {
        $registry = array_merge($registry,$bundles);
    }

    /**
     * register Core Bundles
     * @param array $registry
     */
    protected function registerCoreBundles(&$registry=array())
    {
        $bundles = [
            //Symfony Framework
            new FrameworkBundle(),
            new SecurityBundle(),
            new TwigBundle(),
            new MonologBundle(),
            new SwiftmailerBundle(),
            new DoctrineBundle(),
            new SensioFrameworkExtraBundle(),
            //Caching
            new SncRedisBundle(),
            //Asstic
            new AsseticBundle(),
            //Library
            new MjrLibraryErrbitBundle(),
            new MjrLibraryToolsBundle(),
            new MjrLibraryEntitiesBundle(),
            new MjrLibraryControllerBundle(),
            new MjrLibraryBillingBundle(),
            //Doctrine Extensions
            new AmbtaDoctrineEncryptBundle(),
            new DoctrineMigrationsBundle(),
            new StofDoctrineExtensionsBundle(),
            //Elastic Search
            new FOSElasticaBundle(),
        ];
        $this->addRegisteredBundles($bundles,$registry);
    }

    /**
     * Register Frontend Bundles
     * @param array $registry
     */
    protected function registerFrontendBundles(&$registry=array())
    {
        $bundles = [
            //Template Extensions
            new MopaBootstrapBundle(),
            new KnpMenuBundle(),
            //Two Factor Auth
            new SchebTwoFactorBundle(),
            new RU2FTwoFactorBundle(),
            //Frontend
            new MjrFrontendOperationsBundle(),
            new MjrFrontendDashboardBundle(),
            new MjrFrontendClientBundle(),
            new MjrFrontendResellerBundle(),
            new MjrFrontendMessageBundle(),
            new MjrFrontendSitesWebBundle(),
            new MjrFrontendSitesDatabaseBundle(),
            new MjrFrontendSitesAccessBundle(),
            new MjrFrontendSitesShellBundle(),
            new MjrFrontendSitesCronBundle(),
            new MjrFrontendAPSBundle(),
            new MjrFrontendStatisticsBundle(),
            new MjrFrontendEmailAccountsBundle(),
            new MjrFrontendEmailListBundle(),
            new MjrFrontendEmailSpamBundle(),
            new MjrFrontendEmailFetchmailBundle(),
            new MjrFrontendEmailXmppBundle(),
            new MjrFrontendEmailFiltersBundle(),
            new MjrFrontendDNSBundle(),
            new MjrFrontendvServerBundle(),
            new MjrFrontendMonitoringCPBundle(),
            new MjrFrontendMonitoringServerBundle(),
            new MjrFrontendMonitoringLogBundle(),
            new MjrFrontendHelpBundle(),
            new MjrFrontendSupportBundle(),
            new MjrFrontendToolsBundle(),
            new MjrFrontendSystemUserBundle(),
            new MjrFrontendSystemConfigBundle(),
            new MjrFrontendSystemRemoteBundle(),
            new MjrFrontendSystemAPSBundle(),
            //themes
            new MjrThemeAdminLTEBundle(),

        ];
        $this->addRegisteredBundles($bundles,$registry);
    }

    /**
     * Register API Bundles
     * @param array $registry
     */
    protected function registerApiBundles(&$registry=array())
    {
        $bundles = [
            new FOSRestBundle(),
            new MjrApiBundle(),
            new NelmioApiDocBundle(),
        ];
        $this->addRegisteredBundles($bundles,$registry);
    }

    /**
     * Register Console Bundles
     * @param array $registry
     */
    protected function registerConsoleBundles(&$registry=array())
    {
        $bundles = [
            //Client Related Tasks
            new MjrServerClientBundle(),
            //Cron Related Tasks
            new MjrServerCronBundle(),
            //Mysql, PgSQL, MongoDB related Tasks
            new MjrServerDatabaseBundle(),
            //Dns (mainly bind) related tasks
            new MjrServerDnsBundle(),
            //Mail Server Related Tasks
            new MjrServerMailBundle(),
            //Monitoring Bundle
            new MjrServerMonitorBundle(),
            //Remote Bundle
            new MjrServerRemoteBundle(),
            //Rescue Bundle
            new MjrServerRescueBundle(),
            //Server Config Related Bundle
            new MjrServerServerBundle(),
            //Virtual Machine Bundle
            new MjrServerVMBundle(),
            //Web Server Related Bundle
            new MjrServerWebBundle(),
            //XMPP Related Bundle
            new MjrServerXMPPBundle(),
            //Backup Routines
            new MjrServerBackupBundle(),
            //Support Tasks Related Bundle
            new MjrServerSupportBundle(),
        ];
        $this->addRegisteredBundles($bundles,$registry);
    }

    /**
     * register Development Bundles
     * @param array $registry
     */
    protected function registerDevBundles(&$registry=array())
    {
        $bundles = [
            new DebugBundle(),
            new WebProfilerBundle(),
            new SensioDistributionBundle(),
            new SensioGeneratorBundle(),
            new MjrLibraryProfilerBundle(),
        ];
        $this->addRegisteredBundles($bundles,$registry);
    }

    /**
     * register Installer Basic Bundles
     * @param array $registry
     */
    protected function registerInstallerBundles(&$registry=array())
    {

    }

    /**
     * register Bundles
     * @return array
     */
    public function registerBundles()
    {
        $registry = [ ];
        switch($this->getEnvironment())
        {
            case 'dev':
                $this->registerCoreBundles($registry);
                $this->registerFrontendBundles($registry);
                $this->registerDevBundles($registry);
            break;
            case 'prod':
                $this->registerCoreBundles($registry);
                $this->registerFrontendBundles($registry);
            break;
            case 'console':
                $this->registerCoreBundles($registry);
                $this->registerFrontendBundles($registry);
                $this->registerDevBundles($registry);
                $this->registerConsoleBundles($registry);
            break;
            case 'api':
                $this->registerCoreBundles($registry);
                $this->registerApiBundles($registry);
            break;
            case 'installer':
                $this->registerInstallerBundles($registry);
        }

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            MjrLibraryToolsBundle::setEnvMode();
        }

        return $registry;
    }

    /**
     * get Root Directory
     * @return string
     */
    public function getRootDir()
    {
        return __DIR__;
    }

    /**
     * get Cache Directory
     * @return string
     */
    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    /**
     * get Log Directory
     * @return string
     */
    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    /**
     * register Configuration Container
     * @param LoaderInterface $loader
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/../config/'.$this->getEnvironment().'/config.yml');
    }
}
