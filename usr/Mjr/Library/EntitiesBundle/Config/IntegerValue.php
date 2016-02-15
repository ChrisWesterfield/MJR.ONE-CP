<?php

    namespace Mjr\Library\EntitiesBundle\Config;

    /**
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\QueueBundle\Entities\Config
     * @author Chris Westerfield <chris@mjr.one>
     */
    class IntegerValue implements ConfigInterface
    {
        CONST TYPE="integer_value";
        /**
         * @var integer
         */
        protected $value;
        /**
         * returns the Value
         * @return integer
         */
        public function getValue()
        {
            return (int)$this->value;
        }

        /**
         * set the Value
         * @param integer $value value to be stored
         */
        public function setValue($value)
        {
            $this->value = (int)$value;
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