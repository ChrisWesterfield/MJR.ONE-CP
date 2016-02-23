<?php

    namespace Mjr\Library\EntitiesBundle;

    use Symfony\Component\DependencyInjection\ContainerInterface;
    use Twig_Extension;

    /**
     * Class TwigConfig
     * @package Mjr\Library\EntitiesBundle
     * @author Chris Westerfield <chris@westerfield.name>
     * @license MPL v2.0
     * @copyright Chris Westerfield & MJR.ONE
     * @link https://www.mjr.one
     */
    class TwigConfig extends Twig_Extension
    {
        /**
         * @var ConfigService|ContainerInterface
         */
        protected $config;

        /**
         * BundleExtensions constructor.
         *
         * @param ConfigService|ContainerInterface $container
         */
        public function __construct(ConfigService $container) {
            $this->config = $container;
        }

        /**
         * Returns the name of the extension.
         *
         * @return string The extension name
         */
        public function getName()
        {
            return 'mjr_library_entities_bundle';
        }

        /**
         * @return array
         */
        public function getFunctions()
        {
            return array(
                new \Twig_SimpleFunction(
                    'getConfig',
                    array(
                        $this,
                        'getConfig'
                    )
                ),
            );
        }

        /**
         * @param $Identity
         * @param string $Module
         * @return mixed|ConfigService
         */
        public function getConfig($Identity,$Module='core')
        {
            return $this->config->getSetting($Identity,$Module);
        }
    }