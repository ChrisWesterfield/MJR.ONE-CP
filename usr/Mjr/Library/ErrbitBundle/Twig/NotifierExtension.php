<?php
/*
 * This file is part of the EoAirbrakeBundle package.
 *
 * (c) Eymen Gunay <eymen@egunay.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mjr\Library\ErrbitBundle\Twig;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig_Extension;
use Twig_SimpleFunction;


/**
 * NotifierExtension
 */

/**
 * Class NotifierExtension
 *
 * @package OmegaDev\LibraryBundle\Twig
 * @author chris (chris@omega-shop.net)
 */
class NotifierExtension extends Twig_Extension
{
    /**
     * @var array $options Array of default options that can be overriden with getters and in the construct.
     */
    protected $options = array();
    /**
     * @var ContainerInterface
     */
    protected $container;
    /**
     * Class constructor
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return array(
            'mjr_library_errbit_notifier' => new Twig_SimpleFunction('mjr_library_errbit_notifier',array($this, 'getErrbitNotifier'), array(
                'is_safe' => array('html'),
            ))
        );
    }
    /**
     * {@inheritDoc}
     */
    public function getErrbitNotifier()
    {
        return $this->container
            ->get('templating')
            ->render(
                'MjrLibraryErrbitBundle:Extension:notifier.html.twig',
                array(
                    'host' => $this->container->getParameter('mjr_library_errbit.host'),
                    'api_key' => $this->container->getParameter('mjr_library_errbit.api_key')
                )
            );
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'mjr_library_errbit_notifier_extension';
    }
}