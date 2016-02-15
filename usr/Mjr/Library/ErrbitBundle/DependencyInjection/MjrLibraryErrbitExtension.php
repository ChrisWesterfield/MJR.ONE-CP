<?php

namespace Mjr\Library\ErrbitBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MjrLibraryErrbitExtension extends Extension
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
        $container->setParameter('mjr_library_errbit.api_key', $config['api_key']);
        $container->setParameter('mjr_library_errbit.async', $config['async']);
        $container->setParameter('mjr_library_errbit.host', $config['host']);
        $container->setParameter('mjr_library_errbit.secure', $config['secure']);
        // Exception Listener
        if ($config['api_key']) {
            // Airbreak Configuration
            $class = $container->getParameter('mjr_library_errbit.configuration.class');
            $definition = new Definition($class, array($config['api_key'], $config['async'], $container->getParameter('kernel.environment'), $config['host'], $config['secure']));
            $container->setDefinition('mjr_library_errbit.configuration', $definition);
            // Airbreak Client
            $class = $container->getParameter('mjr_library_errbit.client.class');
            $definition = new Definition($class, array(new Reference('mjr_library_errbit.configuration')));
            $container->setDefinition('mjr_library_errbit.client', $definition);
            // Exception Listener
            $class = $container->getParameter('mjr_library_errbit.exception_listener.class');
            $definition = new Definition($class, array(new Reference('mjr_library_errbit.client'), $config['ignored_exceptions']));
            $definition->addTag('kernel.event_listener', array('event' => 'kernel.exception', 'method' => 'onKernelException'));
            $container->setDefinition('mjr_library_errbit.exception_listener', $definition);
            // PHP Shutdown Listener
            $class = $container->getParameter('mjr_library_errbit.shutdown_listener.class');
            $definition = new Definition($class, array(new Reference('mjr_library_errbit.client')));
            $definition->addTag('kernel.event_listener', array('event' => 'kernel.controller', 'method' => 'register'));
            $container->setDefinition('mjr_library_errbit.shutdown_listener', $definition);
        }
    }
}
