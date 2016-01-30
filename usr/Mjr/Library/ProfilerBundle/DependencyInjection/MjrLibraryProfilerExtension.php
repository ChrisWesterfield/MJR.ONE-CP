<?php

namespace Mjr\Library\ProfilerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MjrLibraryProfilerExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        if ($config['enabled'])
        {
            if (!$config['require_extension_exists'] || function_exists('xhprof_enable') || function_exists('tideways_enable'))
            {
                $loader->load('services.yml');
                foreach ($config as $key => $value)
                {
                    $container->setParameter($this->getAlias().'.'.$key, $value);
                }
            }
            else
            {
                throw new InvalidConfigurationException("Xhprof Bundle is enabled but the xhprof extension is not enabled.");
            }
        }
    }

    public function getAlias()
    {
        return 'mjr_library_profiler';
    }
}
