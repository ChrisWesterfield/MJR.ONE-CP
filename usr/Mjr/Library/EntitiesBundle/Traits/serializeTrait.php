<?php

    namespace Mjr\Library\EntitiesBundle\Traits;

    /**
     * Class serializeTrait
     *
     * @package Mjr\Library\EntitiesBundle\Traits
     * @trait
     * @author Chris Westerfield <chris@mjr.one>
     */
    trait serializeTrait
    {
        /**
         * convert current object to array
         * @return array
         */
        public function toArray(array $exclude=array())
        {
            $return = array();
            foreach($this as $id=>$value)
            {
                if(in_array($id,$exclude))
                {
                    continue;
                }
                if((array)$value===$value)
                {
                    $return[$id] = $value;
                }
                else
                    if(is_object($value) && method_exists($value,'toArray'))
                {
                    $return[$id] = $value->toArray();
                }
                else
                    if(is_object($value))
                {
                    //skip Object
                }
                else
                {
                    $return[$id] = $value;
                }
            }
            return $return;
        }

        /**
         * Json Encode self
         * @return string
         */
        public function toJson()
        {
            return json_encode($this->toArray());
        }

        /**
         * return String Value (serialized)
         * @return string
         */
        public function toString()
        {
            return serialize($this->toArray());
        }

        /**
         * return IGBinary Representation
         * @return mixed
         */
        public function toIgBinary()
        {
            return igbinary_encode($this->toArray());
        }
    }