<?php

namespace Mjr\Frontend\System\ConfigBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class IpAddressController
     * @package Mjr\Frontend\System\ConfigBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
class IpAddressController extends ControllerAbstract
{
    /**
     * @Route("/System/System/Ip/List", name="system_system_ipaddress_list")
     * @Template("MjrFrontendSystemConfigBundle:IpAddress:list.html.twig")
     */
    public function ListAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_ipaddress_list',
        );
    }

    /**
     * @Route("/System/System/Ip/Edit", name="system_system_ipaddress_edit")
     * @Template("MjrFrontendSystemConfigBundle:IpAddress:edit.html.twig")
     */
    public function EditAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_ipaddress_list',
        );
    }

    /**
     * @Route("/System/System/Ip/Create", name="system_system_ipaddress_create")
     * @Template("MjrFrontendSystemConfigBundle:IpAddress:create.html.twig")
     */
    public function CreateAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_ipaddress_create',
        );
    }

    /**
     * @Route("/System/System/Ip/Delete", name="system_system_ipaddress_delete")
     * @Template("MjrFrontendSystemConfigBundle:IpAddress:delete.html.twig")
     */
    public function DeleteAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_ipaddress_list',
        );
    }

}
