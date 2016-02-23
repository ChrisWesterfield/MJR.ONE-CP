<?php

namespace Mjr\Frontend\System\ConfigBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Mjr\Library\EntitiesBundle\Form\Host\ConfigType;
use Mjr\Library\EntitiesBundle\Form\Host\Server\CronType;
use Mjr\Library\EntitiesBundle\Form\Host\Server\DnsType;
use Mjr\Library\EntitiesBundle\Form\Host\Server\FastCgiType;
use Mjr\Library\EntitiesBundle\Form\Host\Server\JailKitType;
use Mjr\Library\EntitiesBundle\Form\Host\Server\MailType;
use Mjr\Library\EntitiesBundle\Form\Host\Server\MonitoringType;
use Mjr\Library\EntitiesBundle\Form\Host\Server\ServerType;
use Mjr\Library\EntitiesBundle\Form\Host\Server\WebType;
use Mjr\Library\EntitiesBundle\Form\Host\Server\XmppType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

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
     * @Template()
     */
    public function ListAction()
    {
        $list = $this->getEm()->getRepository('MjrLibraryEntitiesBundle:Host\Main')->findAll();
        $results = array();
        foreach($list as $item)
        {
            $results[$item->getId()] = $item->getName();
        }
        return array(
            'results'=>$results,
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_config_list',
        );
    }

    /**
     * @Route("/System/System/Config/Edit/{Id}", name="system_system_config_edit")
     * @Template("MjrFrontendSystemConfigBundle:ServerConfig:edit.html.twig")
     * @param Request $request
     * @param $Id
     * @return array
     */
    public function EditAction(Request $request,$Id)
    {
        $server = $this->getEm()->getRepository('MjrLibraryEntitiesBundle:Host\Main')->find((int)$Id);
        if(empty($server) || $server->getId()<1)
        {
            $this->redirectToRoute('system_system_config_list');
        }
        $form = array(
            'server'=>$this->createForm(ServerType::class,$server->getConfigServer()),
            'web'=>$this->createForm(WebType::class,$server->getConfigWeb()),
            'fastcgi'=>$this->createForm(FastCgiType::class,$server->getConfigFastCgi()),
            'mail'=>$this->createForm(MailType::class,$server->getConfigMail()),
            'dns'=>$this->createForm(DnsType::class,$server->getConfigDns()),
            'jailkit'=>$this->createForm(JailKitType::class,$server->getConfigJailKit()),
            'cron'=>$this->createForm(CronType::class,$server->getConfigCron()),
            'xmpp'=>$this->createForm(XmppType::class,$server->getConfigXmpp()),
            'monitoring'=>$this->createForm(MonitoringType::class,$server->getConfigMonitoring()),
        );
        $view = array();
        foreach($form as $id=>$f)
        {
            $f->handleRequest($request);
            if($f->isValid())
            {
                $this->getEm()->flush();
            }
            $view[$id] = $f->createView();
        }
        return array(
            'form'=>$view,
            'id'=>$Id,
            'subtree_navigation'=>'system',
            'subtree_entry'=>'server',
            'subtree_menu'=>'system_system_config_list',
        );
    }
}
