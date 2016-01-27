<?php

namespace Mjr\Library\QueueBundle;

interface LinkGeneratorInterface
{
    function supports($entity);
    function generate($entity);
    function getLinkname($entity);
}