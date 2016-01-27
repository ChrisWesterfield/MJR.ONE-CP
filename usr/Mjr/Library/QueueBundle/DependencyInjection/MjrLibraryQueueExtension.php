<?php

namespace Mjr\Library\QueueBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MjrLibraryQueueExtension extends Extension
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
        $container->setParameter('mjr_library_queue.statistics' , $config[ 'statistics' ]);
        if ($config[ 'statistics' ])
        {
            $loader->load('statistics.yml');
        }
        $container->setParameter('mjr_library_queue.queue_options_defaults' , $config[ 'queue_options_defaults' ]);
        $container->setParameter('mjr_library_queue.queue_options' , $config[ 'queue_options' ]);
    }
}
