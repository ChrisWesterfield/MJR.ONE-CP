<?php

namespace Mjr\Library\QueueBundle;

use RuntimeException;
use Twig_Extension;
use Twig_SimpleFilter;
use Twig_SimpleFunction;
use Twig_SimpleTest;


/*
 * @author Chris Westerfield <chris@westerfield.name>
 * Copyright 2012 Johannes M. Schmitt <schmittjoh@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
class JobQueueExtension extends Twig_Extension
{
    /**
     * @var array
     */
    private $linkGenerators = array();

    /**
     * JobQueueExtension constructor.
     * @param array $generators
     */
    public function __construct(array $generators = array())
    {
        $this->linkGenerators = $generators;
    }

    /**
     * @return array
     */
    public function getTests()
    {
        return array(
            'mjr_library_queue_linkable' => new Twig_SimpleTest('mjr_library_queue_linkable',array($this, 'isLinkable')),
        );
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'mjr_library_queue_path' => new Twig_SimpleFunction('mjr_library_queue_path',array($this, 'generatePath'), array('is_safe' => array('html' => true))),
        );
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            'mjr_library_queue_linkname' => new Twig_SimpleFilter('mjr_library_queue_linkname',array($this, 'getLinkname')),
            'mjr_library_queue_args' => new Twig_SimpleFilter('mjr_library_queue_args',array($this, 'formatArgs')),
        );
    }

    /**
     * @param array $args
     * @param int $maxLength
     * @return string
     */
    public function formatArgs(array $args, $maxLength = 60)
    {
        $str = '';
        $first = true;
        foreach ($args as $arg)
        {
            $argLength = strlen($arg);

            if ( ! $first)
            {
                $str .= ' ';
            }
            $first = false;

            if (strlen($str) + $argLength > $maxLength)
            {
                $str .= substr($arg, 0, $maxLength - strlen($str) - 4).'...';
                break;
            }

            $str .= $arg;
        }

        return $str;
    }

    /**
     * @param $entity
     * @return bool
     */
    public function isLinkable($entity)
    {
        foreach ($this->linkGenerators as $generator)
        {
            /** @var LinkGeneratorInterface $generator */
            if ($generator->supports($entity))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function generatePath($entity)
    {
        foreach ($this->linkGenerators as $generator)
        {
            /** @var LinkGeneratorInterface $generator */
            if ($generator->supports($entity))
            {
                return $generator->generate($entity);
            }
        }

        throw new RuntimeException(sprintf('The entity "%s" has no link generator.', get_class($entity)));
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function getLinkname($entity)
    {
        foreach ($this->linkGenerators as $generator)
        {
            /** @var LinkGeneratorInterface $generator */
            if ($generator->supports($entity))
            {
                return $generator->getLinkname($entity);
            }
        }

        throw new RuntimeException(sprintf('The entity "%s" has no link generator.', get_class($entity)));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mjr_library_queue_extension';
    }
}