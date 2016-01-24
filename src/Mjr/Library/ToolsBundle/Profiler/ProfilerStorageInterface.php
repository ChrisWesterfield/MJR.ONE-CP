<?php

    namespace Mjr\Library\ToolsBundle\Profiler;

    use Symfony\Component\HttpKernel\Profiler\ProfilerStorageInterface as ProfilerStorageSource;

    /**
     * Interface ProfilerStorageInterface
     * @package Mjr\Library\ToolsBundle\Profiler
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
    interface ProfilerStorageInterface extends ProfilerStorageSource
    {
        /**
         * ProfilerStorageInterface constructor.
         *
         * @param $dsn
         * @param $username
         * @param $password
         * @param $ttl
         */
        public function __construct($dsn,$username,$password,$ttl);
    }