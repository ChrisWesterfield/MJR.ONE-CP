<?php

    namespace Mjr\Library\EntitiesBundle\Config;
    use Mjr\Library\EntitiesBundle\Exception\NotAnArrayException;

    /**
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\QueueBundle\Entities\Config
     * @author Chris Westerfield <chris@mjr.one>
     */
    class ArrayValue implements ConfigInterface
    {
        CONST TYPE="array_value";
        /**
         * @var array
         */
        protected $value;
        /**
         * returns the Value
         * @return array
         */
        public function getValue()
        {
            return (array)$this->value;
        }

        /**
         * set the Value
         * @param array $value value to be stored
         * @throws NotAnArrayException
         */
        public function setValue($value)
        {
            if(!is_array($value))
            {
                throw new NotAnArrayException('Value '.var_export($value,true).' is not an array!');
            }
            $this->value = (array)$value;
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