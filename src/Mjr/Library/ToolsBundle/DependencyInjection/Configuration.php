<?php

namespace Mjr\Library\ToolsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('mjr_library_tools');


        $rootNode
            ->children()
                ->arrayNode('data_collector')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('show_filelist')
                            ->defaultFalse()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('data_collector')
                ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('show_filelist')->defaultFalse()->end()
                    ->end()
                ->end()
                ->arrayNode('WebProfiler')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('opcache')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->booleanNode('enabled')
                                    ->defaultFalse()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('routing')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->booleanNode('enabled')
                                    ->defaultFalse()
                                ->end()
                                ->booleanNode('display_in_wdt')
                                    ->defaultFalse()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('assetic')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->booleanNode('enabled')
                                    ->defaultFalse()
                                ->end()
                                ->booleanNode('display_in_wdt')
                                    ->defaultFalse()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('twig')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->booleanNode('enabled')
                                    ->defaultFalse()
                                ->end()
                                ->booleanNode('display_in_wdt')
                                    ->defaultFalse()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('container')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->booleanNode('enabled')
                                    ->defaultFalse()
                                ->end()
                                ->booleanNode('display_in_wdt')
                                    ->defaultFalse()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('profiler')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('defaultStorage')
                            ->defaultTrue()
                        ->end()
                        ->scalarNode('class')
                            ->defaultValue('')
                        ->end()
                        ->scalarNode('dsn')
                            ->defaultValue('')
                        ->end()
                        ->scalarNode('username')
                            ->defaultValue('')
                        ->end()
                        ->scalarNode('password')
                            ->defaultValue('')
                        ->end()
                        ->scalarNode('ttl')
                            ->defaultValue('3600')
                        ->end()
                    ->end()
                ->end();

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
