<?php

namespace Mjr\Library\ErrbitBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('mjr_library_errbit');
        $rootNode
            ->children()
                ->scalarNode('api_key')
                    ->defaultFalse()
                ->end()
                ->booleanNode('async')
                    ->defaultTrue()
                ->end()
                ->scalarNode('host')
                    ->defaultValue('api.airbrake.io')
                ->end()
                ->scalarNode('secure')
                    ->defaultTrue()
                ->end()
                ->variableNode('ignored_exceptions')
                    ->defaultValue(
                        array(
                            'Symfony\Component\HttpKernel\Exception\HttpException'
                        )
                    )
                ->end()
            ->end();
        return $treeBuilder;
    }
}
