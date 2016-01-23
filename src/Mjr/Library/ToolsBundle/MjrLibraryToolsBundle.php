<?php

namespace Mjr\Library\ToolsBundle;

use Mjr\Library\ToolsBundle\CompilerPass\ProfilerCompilerPass;
use Mjr\Library\ToolsBundle\CompilerPass\TwigEnginePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MjrLibraryToolsBundle extends Bundle
{
    protected static $ENV_MODE=false;
    public static function setEnvMode()
    {
        self::$ENV_MODE = true;
    }
    public static function getEnvMode()
    {
        return self::$ENV_MODE;
    }
    public function build(ContainerBuilder $container)
    {
        if(self::getEnvMode())
        {
            $container->addCompilerPass(new TwigEnginePass());
            $container->addCompilerPass(new ProfilerCompilerPass());
        }
    }
}
