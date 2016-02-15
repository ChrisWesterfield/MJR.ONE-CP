<?php

    namespace Mjr\Library\EntitiesBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;

    /**
     * @ORM\Table(name="system_config")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\System
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Config
    {
        /**
         * @ORM\Id
         * @ORM\Column(name="ident", type="string", length=128, unique=true, nullable=false)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Ident;
        /**
         * @ORM\Column(name="module", type="string", length=32, options={"default"="core"}, nullable=false)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Module;
        /**
         * @ORM\Column(name="value", type="text", nullable=true)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Value;

        /**
         * @return string
         */
        public function getIdent()
        {
            return $this->Ident;
        }

        /**
         * @param string $Ident
         * @return $this
         */
        public function setIdent($Ident)
        {
            $this->Ident = $Ident;
            return $this;
        }

        /**
         * @return string
         */
        public function getModule()
        {
            return $this->Module;
        }

        /**
         * @param string $Module
         * @return $this
         */
        public function setModule($Module)
        {
            $this->Module = $Module;
            return $this;
        }

        /**
         * @return string
         */
        public function getValue()
        {

            return $this->Value;
        }

        /**
         * @param string $Value
         * @return $this
         */
        public function setValue($Value)
        {
            $this->Value = $Value;
            return $this;
        }
    }