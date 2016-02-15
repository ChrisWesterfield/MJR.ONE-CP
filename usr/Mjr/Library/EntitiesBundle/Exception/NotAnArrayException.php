<?php

namespace Mjr\Library\EntitiesBundle\Exception;
use Exception;


/**
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\QueueBundle\Entities\Config
 * @author Chris Westerfield <chris@mjr.one>
 */
class NotAnArrayException extends Exception
{

    /**
     * NotAnArrayException constructor.
     * @param string $string
     */
    public function __construct($string)
    {
    }
}