<?php


    namespace Mjr\Library\EntitiesBundle\Entity\System;

    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;


    /**
     * @ORM\Table(name="system_country")
     * @ORM\Entity()
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity\System
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Country
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="string", nullable=false, name="iso")
         * @ORM\GeneratedValue(strategy="IDENTITY")
         * @var string
         */
        protected $iso;
        /**
         * @ORM\Column(name="name",type="string", length=255, nullable=false)
         * @var string
         */
        protected $identity;
        /**
         * @ORM\Column(name="printable_name", length=255, type="string", nullable=false)
         * @var string
         */
        protected $name;
        /**
         * @ORM\Column(name="iso3", length=3, type="string", nullable=false)
         * @var string
         */
        protected $iso3;
        /**
         * @ORM\Column(name="numcode", type="integer", nullable=true)
         * @var string
         */
        protected $numcode;
        /**
         * @ORM\Column(name="eu", type="string", nullable=false, length=1, options={"default"="n"})
         * @var string
         */
        protected $eu;

        /**
         * @return string
         */
        public function getIso()
        {
            return $this->iso;
        }

        /**
         * @param string $iso
         * @return $this
         */
        public function setIso($iso)
        {
            $this->iso = $iso;
            return $this;
        }

        /**
         * @return string
         */
        public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * @param string $identity
         * @return $this
         */
        public function setIdentity($identity)
        {
            $this->identity = $identity;
            return $this;
        }

        /**
         * @return string
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param string $name
         * @return $this
         */
        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }

        /**
         * @return string
         */
        public function getIso3()
        {
            return $this->iso3;
        }

        /**
         * @param string $iso3
         * @return $this
         */
        public function setIso3($iso3)
        {
            $this->iso3 = $iso3;
            return $this;
        }

        /**
         * @return string
         */
        public function getNumcode()
        {
            return $this->numcode;
        }

        /**
         * @param string $numcode
         * @return $this
         */
        public function setNumcode($numcode)
        {
            $this->numcode = $numcode;
            return $this;
        }

        /**
         * @return string
         */
        public function getEu()
        {
            return $this->eu;
        }

        /**
         * @param string $eu
         * @return $this
         */
        public function setEu($eu)
        {
            $this->eu = $eu;
            return $this;
        }
    }
