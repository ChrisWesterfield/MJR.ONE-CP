<?php

    namespace Mjr\Library\EntitiesBundle\Config;

    /**
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\QueueBundle\Entities\Config
     * @author Chris Westerfield <chris@mjr.one>
     */
    class BooleanValue implements ConfigInterface
    {
        CONST TYPE="boolean_value";
        /**
         * @var boolean
         */
        protected $value;
        protected $accepted = array('y','Y','Yes','YES','1',1,true,'Ja','J','JA','On','ON','on','ja');
        /**
         * returns the Value
         * @return boolean
         */
        public function getValue()
        {
            return (boolean)$this->value;
        }

        /**
         * set the Value
         * @param mixed $value value to be stored
         */
        public function setValue($value)
        {
            if(in_array($value, $this->accepted))
            {
                $this->value = true;
            }
            else
            {
                $this->value = false;
            }
        }

        /**
         * returns the Current Value Type
         * @return mixed
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

        /**
         * returns acceptable true values, else always false
         * @return array
         */
        public function getAcceptableAnswers()
        {
            return $this->accepted;
        }
    }