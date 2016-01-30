<?php

namespace Mjr\Frontend\OperationsBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class RegistrationController
     * @package Mjr\Frontend\OperationsBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
class RegistrationController extends ControllerAbstract
{
    /**
     * @Route("/Operations/Register/Step1")
     * @Template("MjrFrontendOperationsBundle:Registration:register1.html.twig")
     */
    public function Register1Action()
    {
        return array(
            // ...
            );}

    /**
     * @Route("/Operations/Register/Step2")
     * @Template("MjrFrontendOperationsBundle:Registration:regsiter2.html.twig")
     */
    public function Regsiter2Action()
    {
        return array(
            // ...
            );}

    /**
     * @Route("/Operations/Register/Step3/{Code}")
     * @Template("MjrFrontendOperationsBundle:Registration:register3.html.twig")
     */
    public function Register3Action($Code)
    {
        return array(
            // ...
            );}

}
