<?php

namespace Mjr\Library\QueueBundle;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class LinkGeneratorsPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $generators = array();
        foreach ($container->findTaggedServiceIds('mjr_library_queue.link_generator') as $id => $attrs)
        {
            $generators[] = new Reference($id);
        }

        $container->getDefinition('mjr_library_queue.twig.extension')->addArgument($generators);
    }
}