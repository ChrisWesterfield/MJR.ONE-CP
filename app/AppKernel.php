<?php

use Ambta\DoctrineEncryptBundle\AmbtaDoctrineEncryptBundle;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle;
use FOS\ElasticaBundle\FOSElasticaBundle;
use Knp\Bundle\MenuBundle\KnpMenuBundle;
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
use Mjr\Library\ControllerBundle\MjrLibraryControllerBundle;
use Mjr\Library\EntitiesBundle\MjrLibraryEntitiesBundle;
use Mjr\Library\NavigationBundle\MjrLibraryNavigationBundle;
use Mjr\Library\ProfilerBundle\MjrLibraryProfilerBundle;
use Mjr\Library\QueueBundle\MjrLibraryQueueBundle;
use Mjr\Library\ToolsBundle\MjrLibraryToolsBundle;
use Mjr\Server\BackupBundle\MjrServerBackupBundle;
use Mjr\Server\ClientBundle\MjrServerClientBundle;
use Mjr\Server\CronBundle\MjrServerCronBundle;
use Mjr\Server\DatabaseBundle\MjrServerDatabaseBundle;
use Mjr\Server\DnsBundle\MjrServerDnsBundle;
use Mjr\Server\InstallBundle\MjrServerInstallBundle;
use Mjr\Server\MailBundle\MjrServerMailBundle;
use Mjr\Server\MonitorBundle\MjrServerMonitorBundle;
use Mjr\Server\RemoteBundle\MjrServerRemoteBundle;
use Mjr\Server\RescueBundle\MjrServerRescueBundle;
use Mjr\Server\ServerBundle\MjrServerServerBundle;
use Mjr\Server\VMBundle\MjrServerVMBundle;
use Mjr\Server\WebBundle\MjrServerWebBundle;
use Mjr\Server\XMPPBundle\MjrServerXMPPBundle;
use Mjr\Theme\AdminLTEBundle\MjrThemeAdminLTEBundle;
use Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle;
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
    public function registerBundles()
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
            new MjrLibraryToolsBundle(),
            new MjrLibraryEntitiesBundle(),
            new MjrLibraryControllerBundle(),
            new MjrLibraryQueueBundle(),
            new MjrLibraryNavigationBundle(),
            //Doctrine Extensions
            new AmbtaDoctrineEncryptBundle(),
            new DoctrineMigrationsBundle(),
            new StofDoctrineExtensionsBundle(),
            //Template Extensions
            new MopaBootstrapBundle(),
            new KnpMenuBundle(),
            //Elastic Search
            new FOSElasticaBundle(),
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

        //Console Application
        if($this->getEnvironment()=='console')
        {
            $consoleBundles = array(
                new MjrServerClientBundle(),
                new MjrServerCronBundle(),
                new MjrServerDatabaseBundle(),
                new MjrServerDnsBundle(),
                new MjrServerMailBundle(),
                new MjrServerMonitorBundle(),
                new MjrServerRemoteBundle(),
                new MjrServerRescueBundle(),
                new MjrServerServerBundle(),
                new MjrServerVMBundle(),
                new MjrServerWebBundle(),
                new MjrServerXMPPBundle(),
                new MjrServerBackupBundle(),
                new MjrServerInstallBundle(),
            );
            $bundles = array_merge($bundles,$consoleBundles);
        }

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new DebugBundle();
            $bundles[] = new WebProfilerBundle();
            $bundles[] = new SensioDistributionBundle();
            $bundles[] = new SensioGeneratorBundle();
            $bundles[] = new MjrLibraryProfilerBundle();
            MjrLibraryToolsBundle::setEnvMode();
        }
        else
        {
            define('env_mode',false);
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/../config/config_'.$this->getEnvironment().'.yml');
    }
}
