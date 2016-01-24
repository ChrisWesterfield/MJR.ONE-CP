<?php

namespace Mjr\Library\ToolsBundle\Profiler;

use Psr\Log\LoggerInterface;
use \Symfony\Component\HttpKernel\Profiler\Profiler as ProfilerSrc;
use Symfony\Component\HttpKernel\Profiler\ProfilerStorageInterface;

/**
 * Profiler.
 * @author Chris Westerfield <chris@MJR.ONE>
 * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
 * @copyright MJR.ONE Group
 * @link http://www.MJR.ONE
 */
class Profiler extends ProfilerSrc
{
    /**
     * Profiler constructor.
     * @param ProfilerStorageInterface $storage
     * @param LoggerInterface $logger
     * @param bool $defaultEnabled
     * @param null $class
     * @param null $dsn
     * @param null $username
     * @param null $password
     * @param int $ttl
     */
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
