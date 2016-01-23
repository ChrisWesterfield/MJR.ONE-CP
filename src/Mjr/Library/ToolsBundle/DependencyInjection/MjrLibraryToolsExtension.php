<?php

namespace Mjr\Library\ToolsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MjrLibraryToolsExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('ProfilerAssetic.yml');
        $loader->load('ProfilerOpCache.yml');
        $loader->load('ProfilerRouting.yml');
        $loader->load('ProfilerTwig.yml');
        $loader->load('ProfilerContainer.yml');
        $container->setParameter(
            'mjr_library_tools.data_collector.show_filelist' ,
            $config[ 'data_collector' ][ 'show_filelist' ]
        );

        //Extended Profiler
        foreach ($config[ 'WebProfiler' ] as $id => $entry)
        {
            if ($entry[ 'enabled' ])
            {
                foreach ($entry as $ids => $item)
                {
                    $path = 'mjr_library_tools.WebProfiler.' . $id . '.' . $ids;
                    $container->setParameter($path , $item);
                }
            }
            else
            {
                $path = 'mjr_library_tools.WebProfiler.' . $id . '.display_in_wdt';
                $container->setParameter($path , false);
            }
        }
        $container->setParameter('mjr_library_tools.profiler.defaultEnabled' , $config[ 'profiler' ][ 'defaultStorage' ]);
        $container->setParameter('mjr_library_tools.profiler.class' , $config[ 'profiler' ][ 'class' ]);
        $container->setParameter('mjr_library_tools.profiler.dsn' , $config[ 'profiler' ][ 'dsn' ]);
        $container->setParameter('mjr_library_tools.profiler.username' , $config[ 'profiler' ][ 'username' ]);
        $container->setParameter('mjr_library_tools.profiler.password' , $config[ 'profiler' ][ 'password' ]);
        $container->setParameter('mjr_library_tools.profiler.ttl' , $config[ 'profiler' ][ 'ttl' ]);
    }
}
