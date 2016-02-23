<?php

    namespace Mjr\Library\EntitiesBundle\Config;

    /**
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\QueueBundle\Entities\Config
     * @author Chris Westerfield <chris@mjr.one>
     */
    interface ConfigInterface
    {
        /**
         * returns the Value
         * @return mixed
         */
        public function getValue();

        /**
         * set the Value
         * @param mixed $value value to be stored
         */
        public function setValue($value);

        /**
         * returns the Current Value Type
         * @return string
         */
        public function getValueType();

        /**
         * returns the Serialized Object as string
         * @return string
         */
        public function toString();
    }