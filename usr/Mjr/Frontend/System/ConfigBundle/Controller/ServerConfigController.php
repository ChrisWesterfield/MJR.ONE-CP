<?php

namespace Mjr\Frontend\System\ConfigBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class ServerConfigController
     * @package Mjr\Frontend\System\ConfigBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
class ServerConfigController extends ControllerAbstract
{
    /**
     * @Route("/System/System/Config/List", name="system_system_config_list")
     * @Template("MjrFrontendSystemConfigBundle:ServerConfig:list.html.twig")
     */
    public function ListAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_config_list',
        );
    }

    /**
     * @Route("/System/System/Config/Edit", name="system_system_config_edit")
     * @Template("MjrFrontendSystemConfigBundle:ServerConfig:edit.html.twig")
     */
    public function EditAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_config_list',
        );
    }
}
