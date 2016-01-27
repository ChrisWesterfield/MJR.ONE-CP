<?php


    namespace Mjr\Library\ToolsBundle\CompilerPass;

    use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
    use Symfony\Component\DependencyInjection\ContainerBuilder;

    /**
     * Class ProfilerCompilerPass
     * @package Mjr\Library\ToolsBundle\CompilerPass
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
    class ProfilerCompilerPass implements CompilerPassInterface
    {

        /**
         * You can modify the container here before it is dumped to PHP code.
         *
         * @param ContainerBuilder $container
         */
        public function process(ContainerBuilder $container)
        {
            $definition = $container->getDefinition('profiler');
            $definition->addArgument('%mjr_library_tools.profiler.defaultEnabled%');
            $definition->addArgument('%mjr_library_tools.profiler.class%');
            $definition->addArgument('%mjr_library_tools.profiler.dsn%');
            $definition->addArgument('%mjr_library_tools.profiler.username%');
            $definition->addArgument('%mjr_library_tools.profiler.password%');
            $definition->addArgument('%mjr_library_tools.profiler.ttl%');
            $definition->setClass('Mjr\Library\ToolsBundle\Profiler\Profiler');
        }
    }