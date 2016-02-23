<?php

namespace Mjr\Library\ToolsBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Bundles
 * @package Mjr\Library\ToolsBundle\Twig
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class BundleExtensions extends \Twig_Extension {
    /**
     * @var mixed
     */
    protected $bundles;

    /**
     * BundleExtensions constructor.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container) {
        $this->bundles = $container->getParameter('kernel.bundles');
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'bundleExists',
                array(
                    $this,
                    'bundleExists'
                )
            ),
        );
    }

    /**
     * @param $bundle
     *
     * @return bool
     */
    public function bundleExists($bundle){
        return array_key_exists(
            $bundle,
            $this->bundles
        );
    }

    /**
     * @return string
     */
    public function getName() {
        return 'home_library_twig_bundles';
    }
}