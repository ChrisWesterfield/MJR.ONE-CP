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
         * @Route("/Operations/Form", name="frontend_operations_form")
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
         * @Route("/Operations/Login", name="frontend_operations_login")
         */
        public function loginAction()
        {
            return array(
                // ...
            );
        }

        /**
         * @Route("/Operations/Logout", name="frontend_operations_logout")
         */
        public function logoutAction()
        {
            return array(
                // ...
            );
        }

        /**
         * @Route("/Operations/forgotPassword1", name="frontend_operations_password1")
         * @Template()
         */
        public function password1Action()
        {
            return array(
                // ...
            );
        }

        /**
         * @Route("/Operations/forgotPassword2", name="frontend_operations_password2")
         * @Template()
         */
        public function password2Action()
        {
            return array(
                // ...
            );
        }

        /**
         * @Route("/Operations/forgotPassword3/{Code}", name="frontend_operations_password3")
         * @Template()
         * @param string $Code
         * @return array
         */
        public function password3Action($Code)
        {
            return array(
                // ...
            );
        }

        /**
         * @Route("/Operations/forgotPassword4/{Code}", name="frontend_operations_password4")
         * @param string $Code
         * @Template()
         * @return array
         */
        public function password4Action($Code)
        {
            return array(
                // ...
            );
        }

    }
