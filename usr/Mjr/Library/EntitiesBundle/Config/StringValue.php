<?php

    namespace Mjr\Library\EntitiesBundle\Config;

    /**
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\QueueBundle\Entities\Config
     * @author Chris Westerfield <chris@mjr.one>
     */
    class StringValue implements ConfigInterface
    {
        CONST TYPE="string_value";
        /**
         * @var string
         */
        protected $value;
        /**
         * returns the Value
         * @return string
         */
        public function getValue()
        {
            return (string)$this->value;
        }

        /**
         * set the Value
         * @param string $value value to be stored
         */
        public function setValue($value)
        {
            $this->value = (string)$value;
        }

        /**
         * returns the Current Value Type
         * @return string
         */
        public function getValueType()
        {
            return self::TYPE;
        }

        /**
         * returns the Serialized Object as string
         * @return string
         */
        public function toString()
        {
            return serialize($this);
        }
    }