<?php

    namespace Mjr\Library\ToolsBundle\Profiler;

    use Symfony\Component\HttpKernel\Profiler\ProfilerStorageInterface as ProfilerStorageSource;

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