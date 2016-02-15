<?php

    namespace Mjr\Library\EntitiesBundle\Config;

    /**
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\QueueBundle\Entities\Config
     * @author Chris Westerfield <chris@mjr.one>
     */
    class FloatValue implements ConfigInterface
    {
        CONST TYPE="float_value";
        /**
         * @var string
         */
        protected $value;
        /**
         * returns the Value
         * @return float
         */
        public function getValue()
        {
            return (float)$this->value;
        }

        /**
         * set the Value
         * @param float $value value to be stored
         */
        public function setValue($value)
        {
            $this->value = (float)$value;
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