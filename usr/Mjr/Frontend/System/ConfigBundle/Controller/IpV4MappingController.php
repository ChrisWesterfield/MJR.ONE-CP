<?php

namespace Mjr\Frontend\System\ConfigBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class IpV4MappingController
     * @package Mjr\Frontend\System\ConfigBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
class IpV4MappingController extends ControllerAbstract
{
    /**
     * @Route("/System/System/IpMapping/List", name="system_system_ipaddressmapping_list")
     * @Template("MjrFrontendSystemConfigBundle:IpV4Mapping:list.html.twig")
     */
    public function ListAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_ipaddressmapping_list',
        );
    }

    /**
     * @Route("/System/System/IpMapping/Edit", name="system_system_ipaddressmapping_edit")
     * @Template("MjrFrontendSystemConfigBundle:IpV4Mapping:edit.html.twig")
     */
    public function EditAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_ipaddressmapping_list',
        );
    }

    /**
     * @Route("/System/System/IpMapping/Create", name="system_system_ipaddressmapping_create")
     * @Template("MjrFrontendSystemConfigBundle:IpV4Mapping:create.html.twig")
     */
    public function CreateAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_ipaddressmapping_create',
        );
    }

    /**
     * @Route("/System/System/IpMapping/Delete", name="system_system_ipaddressmapping_delete")
     * @Template("MjrFrontendSystemConfigBundle:IpV4Mapping:delete.html.twig")
     */
    public function DeleteAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_ipaddressmapping_list',
        );
    }

}
