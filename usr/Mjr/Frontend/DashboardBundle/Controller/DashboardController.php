<?php

namespace Mjr\Frontend\DashboardBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class DashboardController
     * @package Mjr\Frontend\DashboardBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
class DashboardController extends ControllerAbstract
{
    /**
     * @Route("/", name="homepage_controller")
     * @Template("MjrFrontendDashboardBundle:Dashboard:index.html.twig")
     */
    public function IndexAction()
    {
        $this->isUser();
        return array(
            'currentNavigation'=>'homepage_controller',
        );
    }

}
