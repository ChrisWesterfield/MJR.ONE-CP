<?php
    namespace  Mjr\Library\EntitiesBundle;
    use Doctrine\ORM\AbstractQuery;
    use Doctrine\ORM\EntityManager;
    use Mjr\Library\EntitiesBundle\Config\ConfigInterface;
    use Mjr\Library\EntitiesBundle\Entity\Config;
    use Mjr\Library\EntitiesBundle\Exception\ConfigValueCanNotBeDecoded;
    use Redis;
    use Symfony\Component\DependencyInjection\ContainerInterface;

    /**
     * @copyright by the MJR.ONE
     * @link https://www.mjr.one
     * @license Mozilla 2 Public License
     * @package Mjr\Library\QueueBundle\Entities\Config
     * @author Chris Westerfield <chris@mjr.one>
     */
    class ConfigService
    {
        /**
         * Cache Key for Configs
         */
        const CACHE_KEY = 'system.config.storage';
        /**
         * default value for not existing sets
         */
        const NOT_EXIST = null;
        /**
         * @var Redis
         */
        protected $Cache;
        /**
         * @var EntityManager
         */
        protected $EntityManager;
        /**
         * Array of Entries
         * @var ConfigInterface[][]
         */
        protected $Entries;
        /**
         * change Set tracking
         * @var array
         */
        protected $changes = array();

        /**
         * ConfigService constructor.
         * @param ContainerInterface $config
         * @param EntityManager $em
         * @throws ConfigValueCanNotBeDecoded
         * @internal param Redis $redis
         */
        public function __construct(ContainerInterface $config, EntityManager $em)
        {
            $this->Cache = $config->get('snc_redis.default');
            $this->EntityManager = $em;
            $this->Entries = unserialize($this->Cache->get(self::CACHE_KEY));
            if(!is_array($this->Entries) || count($this->Entries) < 1)
            {
                $this->Entries = array();
                $dql = <<<'DQL'
SELECT c FROM MjrLibraryEntitiesBundle:Config c
DQL;
                $query = $this->EntityManager->createQuery($dql);
                /** @var Config[] $results */
                $results = $query->getResult();
                if(count($results) > 0)
                {
                    foreach ($results as $result)
                    {
                        if(!isset($this->Entries[$result->getModule()]))
                        {
                            $this->Entries[$result->getModule()] = array();
                        }
                        $value = unserialize($result->getValue());
                        if(!($value instanceof ConfigInterface))
                        {
                            throw new ConfigValueCanNotBeDecoded('The Config Value for Module '.$result->getModule() . ' with the ident ' . $result->getIdent() . ' could not be unserialized. Please check the Value!');
                        }
                        $this->Entries[$result->getModule()][ $result->getIdent()] = $value;
                    }
                }
                $this->Cache->set(self::CACHE_KEY,serialize($this->Entries));
            }
        }

        /**
         * get Setting
         * @param $name
         * @param string $module
         * @return mixed|ConfigService::NOT_EXIST
         */
        public function getSetting($name,$module='core')
        {
            if(isset($this->Entries[$module][$name]))
            {
                return $this->Entries[$module][$name]->getValue();
            }
            return self::NOT_EXIST;
        }

        /**
         * check if setting exists
         * @param $name
         * @param string $module
         * @return bool
         */
        public function SettingExists($name,$module='core')
        {
            return isset($this->Entries[$module][$name]);
        }

        /**
         * Change Settings
         * WARNING: you need to call save() to persist changes!
         * @param $name
         * @param $value
         * @param string $module
         * @return $this
         */
        public function setSetting($name,$value,$module='core')
        {
            $this->Entries[$module][$name]->setValue($value);
            if(!isset($this->changes[$module]))
            {
                $this->changes[$module] = array();
            }
            $this->changes[$module][$name] = true;
            return $this;
        }

        /**
         * creates an new Setting
         * WARNING: you need to save the changes (by calling save()) to persist changes into the current cache set.
         * @param $name
         * @param $value
         * @param $class
         * @param string $module
         * @return $this
         */
        public function createSetting($name,$value,$class,$module='core')
        {
            /** @var ConfigInterface $object */
            $object = new $class();
            $object->setValue($value);
            $configObject = new Config();
            $configObject->setIdent($name);
            $configObject->setModule($module);
            $configObject->setValue($object->toString());
            $this->EntityManager->persist($configObject);
            $this->EntityManager->flush($configObject);
            if(!isset($this->Entries[$module]))
            {
                $this->Entries[$module] = array();
            }
            $this->Entries[$module][$name] = $object;
            return $this;
        }

        /**
         * Saves All Values if Changes occured!
         * @throws \Doctrine\ORM\NoResultException
         * @throws \Doctrine\ORM\NonUniqueResultException
         */
        public function save()
        {
            if(count($this->changes) > 0)
            {
                foreach($this->changes as $module=>$changeSet)
                {
                    if(count($changeSet) > 0)
                    {
                        foreach($changeSet as $id=>$value)
                        {
                            $qb = $this->EntityManager->createQueryBuilder();
                            $qb->select('c')
                               ->from('MjrLibraryEntitiesBundle:Config', 'c')
                               ->where($qb->expr()->andX(
                                   $qb->expr()->eq('c.Ident','?1'),
                                   $qb->expr()->eq('c.Module','?2')
                               ))
                               ->setParameters(array(
                                   1=>$id,
                                   2=>$module,
                               ));
                            $query = $qb->getQuery();
                            $result = $query->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
                            if($result instanceof Config)
                            {
                                $result->setValue($this->Entries[$module][$id]->toString());
                            }
                        }
                    }
                }
            }
            $this->EntityManager->flush();
            $this->Cache->set(self::CACHE_KEY,serialize($this->Entries));
            $this->changes = array();
        }
    }