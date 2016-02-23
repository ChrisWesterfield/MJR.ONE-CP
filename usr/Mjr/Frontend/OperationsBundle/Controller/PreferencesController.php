<?php

namespace Mjr\Frontend\OperationsBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class PreferencesController
 * @package Mjr\Frontend\OperationsBundle\Controller
 * @author Chris Westerfield <chris@MJR.ONE>
 * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
 * @copyright MJR.ONE Group
 * @link http://www.MJR.ONE
 */
class PreferencesController extends ControllerAbstract
{
    /**
     * @Route("/Preferences", name="preferences")
     * @Template()
     */
    public function PreferencesAction()
    {
        return array
        (
            // ...
        );
    }
}