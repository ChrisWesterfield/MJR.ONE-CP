<?php

namespace Mjr\Frontend\System\ConfigBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * Class SnippetsController
     * @package Mjr\Frontend\System\ConfigBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
class SnippetsController extends ControllerAbstract
{
    /**
     * @Route("/System/System/Snippets/List", name="system_system_snippets_list")
     * @Template("MjrFrontendSystemConfigBundle:Sippets:list.html.twig")
     */
    public function ListAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_snippets_list',
        );
    }

    /**
     * @Route("/System/System/Snippets/Edit", name="system_system_snippets_edit")
     * @Template("MjrFrontendSystemConfigBundle:Sippets:edit.html.twig")
     */
    public function EditAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_snippets_list',
        );
    }

    /**
     * @Route("/System/System/Snippets/Create", name="system_system_snippets_create")
     * @Template("MjrFrontendSystemConfigBundle:Sippets:create.html.twig")
     */
    public function CreateAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_snippets_create',
        );
    }

    /**
     * @Route("/System/System/Snippets/Delete", name="system_system_snippets_delete")
     * @Template("MjrFrontendSystemConfigBundle:Sippets:delete.html.twig")
     */
    public function DeleteAction()
    {
        return array(
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_snippets_list',
        );
    }

}
