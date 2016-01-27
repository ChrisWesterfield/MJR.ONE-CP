<?php

namespace Mjr\Library\QueueBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
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
        $rootNode = $treeBuilder->root('mjr_library_queue');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        $rootNode
            ->children()
                ->booleanNode('statistics')
                    ->defaultTrue()
                ->end()
            ->end();

        $defaultOptionsNode = $rootNode
            ->children()
                ->arrayNode('queue_options_defaults')
                    ->addDefaultsIfNotSet();
        $this->addQueueOptions($defaultOptionsNode);

        $queueOptionsNode = $rootNode
            ->children()
                ->arrayNode('queue_options')
                    ->useAttributeAsKey('queue')
                        ->prototype('array');
        $this->addQueueOptions($queueOptionsNode);

        return $treeBuilder;
    }

    /**
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $def
     */
    protected function addQueueOptions(ArrayNodeDefinition $def)
    {
        $def
            ->children()
                ->scalarNode('max_concurrent_jobs')
            ->end();
    }
}
