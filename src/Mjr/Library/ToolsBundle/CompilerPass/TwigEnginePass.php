<?php

namespace Mjr\Library\ToolsBundle\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class TwigEnginePass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if ( !$container->hasParameter('mjr_library_tools.WebProfiler.twig.enabled')
             || !$container->getParameter('mjr_library_tools.WebProfiler.twig.enabled')
        )
        {
            return;
        }

        $container->setDefinition(
            'templating.engine.twig.decorated' ,
            $container->getDefinition('templating.engine.twig')
        );

        $container->setDefinition(
            'templating.engine.twig' ,
            new Definition(
                '%mjr_library_tools.templating.engine.twig.class%' ,
                array(
                    new Reference('twig') ,
                    new Reference('templating.engine.twig.decorated') ,
                    new Reference('mjr_library_tools.data_collector.twig') ,
                )
            )
        );

    }
}