<?php


        namespace Mjr\Library\NavigationBundle\Builder;

        use Doctrine\ORM\EntityManager;
        use Knp\Menu\FactoryInterface;
        use Knp\Menu\ItemInterface;
        use Redis;
        use Symfony\Component\DependencyInjection\Container;
        use Symfony\Component\HttpFoundation\RequestStack;
        use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

        class Builder
        {
            const CACHE_PREFIX = 'kpnMenu.SystemCache.';
            /**
             * @var EntityManager
             */
            protected $em;
            /**
             * @var FactoryInterface
             */
            protected $factory;
            /**
             * @var Redis
             */
            protected $redis;
            /**
             * @var TokenStorage
             */
            protected $tokenStorage;

            /**
             * Builder constructor.
             * @param FactoryInterface $factory
             * @param EntityManager $em
             * @param Redis $redis
             * @param TokenStorage $tokenStorage
             */
            public function __construct(FactoryInterface $factory, EntityManager $em, Redis $redis, TokenStorage $tokenStorage)
            {
                $this->em = $em;
                $this->factory = $factory;
                $this->redis = $redis;
                $this->tokenStorage = $tokenStorage;
            }

            protected function createMenuContent(ItemInterface $menu=null, $ItemId)
            {
                if(empty($menu))
                {
                    /** @var ItemInterface  $menu */
                    $menu = $this->factory->createItem(
                        'root',
                        array(
                            'navbar'=>true
                        )
                    );
                }
                return $menu;
            }

            public function createMainMenu(RequestStack $requestStack)
            {
                $cachePath = self::CACHE_PREFIX.$this->tokenStorage->getToken()->getId();
                if($this->redis->exists($cachePath))
                {
                    $menu = $this->redis->get($cachePath);
                    if(!($menu instanceof ItemInterface))
                    {
                        $menu = $this->createMenuContent(null);
                    }
                    return $menu;
                }
                else
                {
                    return $this->factory->createItem(
                        'root',
                        array(
                            'navbar'=>true
                        )
                    );
                }
            }
        }