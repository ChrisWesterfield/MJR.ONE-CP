<?php

namespace Mjr\Library\ToolsBundle\Profiler;

use Psr\Log\LoggerInterface;
use \Symfony\Component\HttpKernel\Profiler\Profiler as ProfilerSrc;
use Symfony\Component\HttpKernel\Profiler\ProfilerStorageInterface;

/**
 * Profiler.
 */
class Profiler extends ProfilerSrc
{
    public function __construct(ProfilerStorageInterface $storage , LoggerInterface $logger , $defaultEnabled = true ,
                                $class = null , $dsn = null , $username = null , $password = null , $ttl = 3600)
    {
        if ($defaultEnabled !== true)
        {
            $storage = new $class($dsn , $username , $password , $ttl);
        }
        parent::__construct($storage , $logger);
    }
}
