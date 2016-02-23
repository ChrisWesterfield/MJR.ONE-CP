<?php

namespace Mjr\Frontend\System\ConfigBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class FirewallController
     * @package Mjr\Frontend\System\ConfigBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
class FirewallController extends ControllerAbstract
{
    /**
     * @Route("/System/System/Firewall/List", name="system_system_firewall_list")
     * @Template("MjrFrontendSystemConfigBundle:Firewall:list.html.twig")
     */
    public function ListAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_firewall_list',
        );
    }

    /**
     * @Route("/System/System/Firewall/Edit", name="system_system_firewall_edit")
     * @Template("MjrFrontendSystemConfigBundle:Firewall:edit.html.twig")
     */
    public function EditAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_firewall_list',
        );
    }

    /**
     * @Route("/System/System/Firewall/Create", name="system_system_firewall_create")
     * @Template("MjrFrontendSystemConfigBundle:Firewall:create.html.twig")
     */
    public function CreateAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_firewall_create',
        );
    }

    /**
     * @Route("/System/System/Firewall/Delete", name="system_system_firewall_delete")
     * @Template("MjrFrontendSystemConfigBundle:Firewall:delete.html.twig")
     */
    public function DeleteAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_firewall_list',
        );
    }

}
