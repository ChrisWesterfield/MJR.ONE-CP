<?php

    namespace Mjr\Library\EntitiesBundle\Entity;

    use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
    use Mjr\Library\EntitiesBundle\Traits\IdTrait;
    use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
    use Mjr\Library\EntitiesBundle\Traits\ServerTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
    use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;

    /**
     * @ORM\Table(name="cron")
     * @ORM\Entity()
     * @Gedmo\Loggable
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\EntitiesBundle\Entity
     * @author Chris Westerfield <chris@mjr.one>
     */
    class Cron
    {
        use IdTrait;
        use SystemUserTrait;
        use SystemGroupTrait;
        use ServerTrait;
        use ActiveTrait;
        use LogableTrait;
        /**
         * @ORM\OneToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Domain", fetch="EXTRA_LAZY")
         * @ORM\JoinColumn(name="domain_id", referencedColumnName="id")
         */
        protected $Domain;
        /**
         * @ORM\Column(name="type", type="string", length=10, nullable=false, options={"default" = "url"})
         * @var string
         * @Gedmo\Versioned
         */
        protected $Type;
        /**
         * @ORM\Column(name="command", type="text", nullable=false)
         * @var string
         * @Gedmo\Versioned
         */
        protected $Command;
        /**
         * @ORM\Column(name="run_minute", type="text", nullable=false, length=100)
         * @var string
         * @Gedmo\Versioned
         */
        protected $RunMinute;
        /**
         * @ORM\Column(name="run_hour", type="text", nullable=false, length=100)
         * @var string
         * @Gedmo\Versioned
         */
        protected $RunHour;
        /**
         * @ORM\Column(name="run_day", type="text", nullable=false, length=100)
         * @var string
         * @Gedmo\Versioned
         */
        protected $RunDay;
        /**
         * @ORM\Column(name="run_week_day", type="text", nullable=false, length=100)
         * @var string
         * @Gedmo\Versioned
         */
        protected $RunWeekDay;
        /**
         * @ORM\Column(name="run_month", type="text", nullable=false, length=100)
         * @var string
         * @Gedmo\Versioned
         */
        protected $RunMonth;
        /**
         * @ORM\Column(name="log", type="boolean", nullable=false, options={"default"=false})
         * @var boolean
         * @Gedmo\Versioned
         */
        protected $log;

        /**
         * @return mixed
         */
        public function getDomain()
        {
            return $this->Domain;
        }

        /**
         * @param mixed $Domain
         * @return $this
         */
        public function setDomain($Domain)
        {
            $this->Domain = $Domain;
            return $this;
        }

        /**
         * @return string
         */
        public function getType()
        {
            return $this->Type;
        }

        /**
         * @param string $Type
         * @return $this
         */
        public function setType($Type)
        {
            $this->Type = $Type;
            return $this;
        }

        /**
         * @return string
         */
        public function getCommand()
        {
            return $this->Command;
        }

        /**
         * @param string $Command
         * @return $this
         */
        public function setCommand($Command)
        {
            $this->Command = $Command;
            return $this;
        }

        /**
         * @return string
         */
        public function getRunMinute()
        {
            return $this->RunMinute;
        }

        /**
         * @param string $RunMinute
         * @return $this
         */
        public function setRunMinute($RunMinute)
        {
            $this->RunMinute = $RunMinute;
            return $this;
        }

        /**
         * @return string
         */
        public function getRunHour()
        {
            return $this->RunHour;
        }

        /**
         * @param string $RunHour
         * @return $this
         */
        public function setRunHour($RunHour)
        {
            $this->RunHour = $RunHour;
            return $this;
        }

        /**
         * @return string
         */
        public function getRunDay()
        {
            return $this->RunDay;
        }

        /**
         * @param string $RunDay
         * @return $this
         */
        public function setRunDay($RunDay)
        {
            $this->RunDay = $RunDay;
            return $this;
        }

        /**
         * @return string
         */
        public function getRunWeekDay()
        {
            return $this->RunWeekDay;
        }

        /**
         * @param string $RunWeekDay
         * @return $this
         */
        public function setRunWeekDay($RunWeekDay)
        {
            $this->RunWeekDay = $RunWeekDay;
            return $this;
        }

        /**
         * @return string
         */
        public function getRunMonth()
        {
            return $this->RunMonth;
        }

        /**
         * @param string $RunMonth
         * @return $this
         */
        public function setRunMonth($RunMonth)
        {
            $this->RunMonth = $RunMonth;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isLog()
        {
            return $this->log;
        }

        /**
         * @param boolean $log
         * @return $this
         */
        public function setLog($log)
        {
            $this->log = $log;
            return $this;
        }
    }