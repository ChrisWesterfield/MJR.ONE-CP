<?php

    namespace Mjr\Library\EntitiesBundle;

    use Doctrine\ORM\EntityManager;
    use Mjr\Library\EntitiesBundle\Entity\System\Translation;
    use Symfony\Component\Translation\Exception\InvalidResourceException;
    use Symfony\Component\Translation\Exception\NotFoundResourceException;
    use Symfony\Component\Translation\Loader\LoaderInterface;
    use Symfony\Component\Translation\MessageCatalogue;

    class DbLoader implements LoaderInterface
    {
        /**
         * @var EntityManager
         */
        protected $entityManager;
        protected $loadAll = true;

        /**
         * @param EntityManager $entityManager
         */
        public function __construct(EntityManager $entityManager){
            $this->entityManager = $entityManager;
        }
        /**
         * Loads a locale.
         *
         * @param mixed $resource A resource
         * @param string $locale A locale
         * @param string $domain The domain
         *
         * @return MessageCatalogue A MessageCatalogue instance
         *
         * @throws NotFoundResourceException when the resource cannot be found
         * @throws InvalidResourceException  when the resource cannot be loaded
         */
        public function load($resource , $locale , $domain = 'messages')
        {
            if(!$this->loadAll!==true)
            {
                return new MessageCatalogue($locale);
            }
            $dql = <<<'DQL'
                SELECT
                  t
                FROM
                  MjrLibraryEntitiesBundle:System\Translation t
              WHERE
                  t.Locale = :locale
              ORDER BY t.Id ASC
DQL;
            $query = $this->entityManager->createQuery($dql);
            $query->setParameter(':locale',$locale);
            /** @var Translation[] $results */
            $results = $query->getResult();
            $catalogue = new MessageCatalogue($locale);
            if(count($results) > 0)
            {
                foreach($results as $result)
                {
                    $catalogue->set($result->getTranslation(),$result->getIdenity(),$domain);
                }
            }
            return $catalogue;
        }
    }