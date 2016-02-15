<?php

namespace Mjr\Frontend\System\ConfigBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class PhpVersionsController
     * @package Mjr\Frontend\System\ConfigBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
class PhpVersionsController extends ControllerAbstract
{
    /**
     * @Route("/System/System/PhpVersion/List", name="system_system_phpversion_list")
     * @Template("MjrFrontendSystemConfigBundle:PhpVersions:list.html.twig")
     */
    public function ListAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_phpversion_list',
        );
    }

    /**
     * @Route("/System/System/PhpVersion/Edit", name="system_system_phpversion_edit")
     * @Template("MjrFrontendSystemConfigBundle:PhpVersions:edit.html.twig")
     */
    public function EditAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_phpversion_list',
        );
    }

    /**
     * @Route("/System/System/PhpVersion/Create", name="system_system_phpversion_create")
     * @Template("MjrFrontendSystemConfigBundle:PhpVersions:create.html.twig")
     */
    public function CreateAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_phpversion_create',
        );
    }

    /**
     * @Route("/System/System/PhpVersion/Delete", name="system_system_phpversion_delete")
     * @Template("MjrFrontendSystemConfigBundle:PhpVersions:delete.html.twig")
     */
    public function DeleteAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_phpversion_list',
        );
    }

}
