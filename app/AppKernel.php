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
            new Mjr\ClientBundle\MjrClientBundle(),
            new Mjr\SitesBundle\MjrSitesBundle(),
            new Mjr\DatabaseBundle\MjrDatabaseBundle(),
            new Mjr\APSBundle\MjrAPSBundle(),
            new Mjr\StatisticsBundle\MjrStatisticsBundle(),
            new Mjr\EmailBundle\MjrEmailBundle(),
            new Mjr\DNSBundle\MjrDNSBundle(),
            new Mjr\vServerBundle\MjrvServerBundle(),
            new Mjr\MonitorBundle\MjrMonitorBundle(),
            new Mjr\LogsBundle\MjrLogsBundle(),
            new Mjr\MongoBundle\MjrMongoBundle(),
            new Mjr\PgSQLBundle\MjrPgSQLBundle(),
            new Mjr\HelpBundle\MjrHelpBundle(),
            new Mjr\SupportBundle\MjrSupportBundle(),
            new Mjr\VersionBundle\MjrVersionBundle(),
            new Mjr\ToolsBundle\MjrToolsBundle(),
            new Mjr\SystemBundle\MjrSystemBundle(),
            new Mjr\ServerSiteBundle\MjrServerSiteBundle(),
            new Mjr\ServerDatabaseBundle\MjrServerDatabaseBundle(),
            new Mjr\ServerBackupBundle\MjrServerBackupBundle(),
            new Mjr\ServerMonitorBundle\MjrServerMonitorBundle(),
            new Mjr\ServerLogBundle\MjrServerLogBundle(),
            new Mjr\ServerVMBundle\MjrServerVMBundle(),
            new Mjr\ServerXMPPBundle\MjrServerXMPPBundle(),
            new Mjr\ServerCronBundle\MjrServerCronBundle(),
            new Mjr\ServerGetMailBundle\MjrServerGetMailBundle(),
            new Mjr\ServerMailManBundle\MjrServerMailManBundle(),
            new Mjr\ServerShellBundle\MjrServerShellBundle(),
            new Mjr\ServerJailkitBundle\MjrServerJailkitBundle(),
            new Mjr\ServerFirewallBundle\MjrServerFirewallBundle(),
            new Mjr\ServerSoftwareBundle\MjrServerSoftwareBundle(),
            new Mjr\ServerMailBundle\MjrServerMailBundle(),
            new Mjr\SecurityBundle\MjrSecurityBundle(),
            new Mjr\Library\ToolsBundle\MjrLibraryToolsBundle(),
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
