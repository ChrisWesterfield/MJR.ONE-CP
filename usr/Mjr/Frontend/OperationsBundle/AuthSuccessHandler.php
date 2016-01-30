<?php

namespace Mjr\Frontend\OperationsBundle;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler;
use Symfony\Component\Security\Http\HttpUtils;
use Symfony\Component\HttpFoundation\Session;

/**
 * Class AuthSuccessHandler
 * @package Mjr\Frontend\OperationsBundle
 * @author Chris Westerfield <chris@MJR.ONE>
 * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
 * @copyright MJR.ONE Group
 * @link http://www.MJR.ONE
 */
class AuthSuccessHandler extends DefaultAuthenticationSuccessHandler
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * AuthSuccessHandler constructor.
     * @param HttpUtils $httpUtils
     * @param ContainerInterface $cont
     * @param array $options
     */
    public function __construct(HttpUtils $httpUtils, ContainerInterface $cont, array $options)
    {
        parent::__construct($httpUtils, $options);
        $this->container = $cont;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $user = $token->getUser();
        $user->setLastlogin(new \DateTime());
        $em = $this->container->get('doctrine.orm.entity_manager');

        $em->persist($user);
        $em->flush();

        return $this->httpUtils->createRedirectResponse($request, $this->determineTargetUrl($request));
    }
}