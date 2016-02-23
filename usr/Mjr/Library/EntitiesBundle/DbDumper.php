<?php

    namespace Mjr\Library\EntitiesBundle;

    use Mjr\Library\EntitiesBundle\Entity\System\Translation;
    use Symfony\Component\Translation\Dumper\DumperInterface;
    use Symfony\Component\Translation\MessageCatalogue;

    /**
     * Class DbDumper
     * @package Mjr\Library\EntitiesBundle
     * @author Chris Westerfield <chris@westerfield.name>
     * @license MPL v2.0
     * @copyright Chris Westerfield & MJR.ONE
     * @link https://www.mjr.one
     */
    class DbDumper extends DbLoader implements DumperInterface
    {
        /**
         * Dumps the message catalogue.
         *
         * @param MessageCatalogue $messages The message catalogue
         * @param array            $options  Options that are used by the dumper
         */
        public function dump(MessageCatalogue $messages, $options = array())
        {
            $this->loadAll=false;
            $locale = $messages->getLocale();
            try{
            foreach ($messages->getDomains() as $eachDomain)
            {
                foreach ($messages->all($eachDomain) as $eachKey => $eachTranslation)
                {
                    $queryBuilder = $this->entityManager->createQueryBuilder();
                    $queryBuilder->select('t')
                          ->from('MjrLibraryEntitiesBundle:System\Translation', 't')
                          ->where(
                              $queryBuilder->expr()->andX(
                                  $queryBuilder->expr()->eq('t.Identity','?1'),
                                  $queryBuilder->expr()->eq('t.Locale','?2'))
                          );
                    $query = $this->entityManager->createQuery($queryBuilder->getDQL());
                    $query->setParameters(array(1=>$eachKey,2=>$locale));
                    $result = $query->getArrayResult();
                    if(count($result) < 1)
                    {
                        $entry = new Translation();
                        $entry->setLocale($locale);
                        $entry->setIdentity($eachKey);
                        $entry->setTranslation($eachKey);
                        $this->entityManager->persist($entry);
                        $this->entityManager->flush();
                    }
                    unset($query,$queryBuilder,$entry,$eachKey,$eachTranslation);
                }
            }
            }catch(\Exception $ex)
            {
                var_dump($ex);die;
            }
        }
    }