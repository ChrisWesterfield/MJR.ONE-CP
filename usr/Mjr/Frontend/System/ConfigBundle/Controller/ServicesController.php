<?php

namespace Mjr\Frontend\System\ConfigBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class ServicesController
     * @package Mjr\Frontend\System\ConfigBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
class ServicesController extends ControllerAbstract
{
    /**
     * @Route("/System/System/Services/List", name="system_system_services_list")
     * @Template("MjrFrontendSystemConfigBundle:Services:list.html.twig")
     */
    public function ListAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_services_list',
        );
    }

    /**
     * @Route("/System/System/Services/Edit", name="system_system_services_edit")
     * @Template("MjrFrontendSystemConfigBundle:Services:edit.html.twig")
     */
    public function EditAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_services_list',
        );
    }

    /**
     * @Route("/System/System/Services/Delete", name="system_system_services_delete")
     * @Template("MjrFrontendSystemConfigBundle:Services:delete.html.twig")
     */
    public function DeleteAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_services_list',
        );
    }

}
