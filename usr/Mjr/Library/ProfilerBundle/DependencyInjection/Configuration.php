<?php

namespace Mjr\Library\ProfilerBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('mjr_library_profiler');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.


        $rootNode
            ->children()
                ->scalarNode('storage')
                    ->defaultValue('php')
                ->end()
                ->scalarNode('location_web')
                    ->defaultValue('http://xhprof')
                ->end()
                ->scalarNode('manager_registry')
                    ->defaultValue('doctrine')
                ->end()
                ->scalarNode('entity_manager')
                    ->defaultValue('default')
                ->end()
                ->scalarNode('entity_class')
                    ->defaultValue(null)
                ->end()
                ->scalarNode('enable_xhgui')
                    ->defaultFalse()
                ->end()
                ->arrayNode('exclude_patterns')
                    ->prototype('scalar')
                    ->end()
                ->end()
                ->scalarNode('sample_size')
                    ->defaultValue(1)
                ->end()
                ->scalarNode('enabled')
                    ->defaultFalse()
                ->end()
                ->scalarNode('require_extension_exists')
                    ->defaultTrue()
                ->end()
                ->scalarNode('skip_builtin_functions')
                    ->defaultFalse()
                ->end()
                ->scalarNode('request_query_argument')
                    ->defaultFalse()
                ->end()
                ->scalarNode('response_header')
                    ->defaultValue('X-Xhprof-Url')
                ->end()
                ->enumNode('command')
                    ->values(array('on', 'option', 'off'))
                    ->defaultValue('option')
                    ->info('on: Always profile, off: Never profile, option: only profile if option specified in command_option_name is given.')
                ->end()
                ->scalarNode('command_option_name')
                    ->defaultValue('xhprof')
                    ->info('If "command" is set to "option", this is the name of the additional option that all commands get.')
                ->end()
                ->arrayNode('command_exclude_patterns')
                    ->prototype('scalar')
                ->end()
                ->beforeNormalization()
                    ->ifTrue(function($v) { return $v === null; })
                    ->then(function($v) { return array(); })
                    ->end()
                    ->info('List of regular expressions to match commands that are not profiled.')
                ->end()
            ->end();

        return $treeBuilder;
    }
}