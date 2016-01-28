<?php

    namespace Mjr\Frontend\OperationsBundle\Controller;

    use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class SecurityController
     * @package Mjr\Frontend\OperationsBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
    class SecurityController extends ControllerAbstract
    {
        /**
         * @Route("/Operations/Form", name="operations_security_form")
         * @Template()
         */
        public function formAction()
        {
            $user = $this->get('security.token_storage')->getToken()->getUser();
            if($user === "anon.") {
                $authenticationUtils = $this->get('security.authentication_utils');

                // get the login error if there is one
                $error = $authenticationUtils->getLastAuthenticationError();

                // last username entered by the user
                $lastUsername = $authenticationUtils->getLastUsername();

                return array(
                    // last username entered by the user
                    'last_username' => $lastUsername,
                    'error' => $error,
                );
            }
            else
            {
                return $this->redirectToRoute('home_start');
            }
        }

        /**
         * @Route("/Operations/Login", name="operations_security_login")
         * @Template()
         */
        public function loginAction()
        {
            return array(
                // ...
            );
        }

        /**
         * @Route("/Operations/Logout", name="operations_security_logout")
         * @Template()
         */
        public function logoutAction()
        {
            return array(
                // ...
            );
        }

    }
