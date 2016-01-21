<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
	    new Snc\RedisBundle\SncRedisBundle(),
            new Mjr\Library\ToolsBundle\MjrLibraryToolsBundle(),
            new Mjr\Frontend\DashboardBundle\MjrFrontendDashboardBundle(),
            new Mjr\Frontend\ClientBundle\MjrFrontendClientBundle(),
            new Mjr\Frontend\ResellerBundle\MjrFrontendResellerBundle(),
            new Mjr\Frontend\MessageBundle\MjrFrontendMessageBundle(),
            new Mjr\Frontend\Sites\WebBundle\MjrFrontendSitesWebBundle(),
            new Mjr\Frontend\Sites\DatabaseBundle\MjrFrontendSitesDatabaseBundle(),
            new Mjr\Frontend\Sites\AccessBundle\MjrFrontendSitesAccessBundle(),
            new Mjr\Frontend\Sites\ShellBundle\MjrFrontendSitesShellBundle(),
            new Mjr\Frontend\Sites\CronBundle\MjrFrontendSitesCronBundle(),
            new Mjr\Frontend\APSBundle\MjrFrontendAPSBundle(),
            new Mjr\Frontend\StatisticsBundle\MjrFrontendStatisticsBundle(),
            new Mjr\Frontend\Email\AccountsBundle\MjrFrontendEmailAccountsBundle(),
            new Mjr\Frontend\Email\ListBundle\MjrFrontendEmailListBundle(),
            new Mjr\Frontend\Email\SpamBundle\MjrFrontendEmailSpamBundle(),
            new Mjr\Frontend\Email\FetchmailBundle\MjrFrontendEmailFetchmailBundle(),
            new Mjr\Frontend\Email\XmppBundle\MjrFrontendEmailXmppBundle(),
            new Mjr\Frontend\Email\FiltersBundle\MjrFrontendEmailFiltersBundle(),
            new Mjr\Frontend\DNSBundle\MjrFrontendDNSBundle(),
            new Mjr\Frontend\vServerBundle\MjrFrontendvServerBundle(),
            new Mjr\Frontend\Monitoring\CPBundle\MjrFrontendMonitoringCPBundle(),
            new Mjr\Frontend\Monitoring\ServerBundle\MjrFrontendMonitoringServerBundle(),
            new Mjr\Frontend\Monitoring\LogBundle\MjrFrontendMonitoringLogBundle(),
            new Mjr\Frontend\HelpBundle\MjrFrontendHelpBundle(),
            new Mjr\Frontend\SupportBundle\MjrFrontendSupportBundle(),
            new Mjr\Frontend\ToolsBundle\MjrFrontendToolsBundle(),
            new Mjr\Frontend\System\UserBundle\MjrFrontendSystemUserBundle(),
            new Mjr\Frontend\System\ConfigBundle\MjrFrontendSystemConfigBundle(),
            new Mjr\Frontend\System\RemoteBundle\MjrFrontendSystemRemoteBundle(),
            new Mjr\Frontend\System\APSBundle\MjrFrontendSystemAPSBundle(),
            new Mjr\Server\ClientBundle\MjrServerClientBundle(),
            new Mjr\Server\CronBundle\MjrServerCronBundle(),
            new Mjr\Server\DatabaseBundle\MjrServerDatabaseBundle(),
            new Mjr\Server\DnsBundle\MjrServerDnsBundle(),
            new Mjr\Server\MailBundle\MjrServerMailBundle(),
            new Mjr\Server\MonitorBundle\MjrServerMonitorBundle(),
            new Mjr\Server\RemoteBundle\MjrServerRemoteBundle(),
            new Mjr\Server\RescueBundle\MjrServerRescueBundle(),
            new Mjr\Server\ServerBundle\MjrServerServerBundle(),
            new Mjr\Server\VMBundle\MjrServerVMBundle(),
            new Mjr\Server\WebBundle\MjrServerWebBundle(),
            new Mjr\Server\XMPPBundle\MjrServerXMPPBundle(),
            new Mjr\Server\BackupBundle\MjrServerBackupBundle(),
            new Mjr\Server\InstallBundle\MjrServerInstallBundle(),
            new Mjr\Library\EntitiesBundle\MjrLibraryEntitiesBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
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
