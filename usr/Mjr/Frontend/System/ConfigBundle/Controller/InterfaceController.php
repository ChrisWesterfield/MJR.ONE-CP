<?php

namespace Mjr\Frontend\System\ConfigBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
     * Class InterfaceController
     * @package Mjr\Frontend\System\ConfigBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
class InterfaceController extends ControllerAbstract
{
    /**
     * @Route("/System/Interface/Config", name="system_system_interface")
     * @Template("MjrFrontendSystemConfigBundle:Interface:view_config.html.twig")
     */
    public function ViewConfigAction()
    {
        $list = array(
            'FlagpmaEnabledList'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagpmaEnabledSite'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagpgaEnabledList'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagpgaEnabledSite'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagwftpEnabledList'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagwftpEnabledSite'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagmdaEnabledList'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagmdaEnabledSite'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagrcpEnabledList'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagrcpEnabledSite'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagCreateSubdomainSite'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagCreateAliasSite'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagBackupFileQuota'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagResellerSiteOption'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagMailCustomLogin'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagAccountAutoRespondDetails'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagCustomMailFilterInDetails'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagwmaEnabledList'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagwmaEnabledSite'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagMLinList'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagUserDomainRegistry'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlaguseLoadIndicator'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'FlagMaintenanceMode'=>array('\Mjr\Library\EntitiesBundle\Config\BooleanValue',false),
            'pmaUrl'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'pgaUrl'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'wftpUrl'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'mdaUrl'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'rcpUrl'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'defaultWebServer'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'defaultMySQLServer'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'defaultPgSQLServer'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'defaultMongoDbServer'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'defaultRedisServer'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'DataBasePrefix'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue','d[CLIENTID]'),
            'DatabaseUserNamePRefix'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue','du[CLIENTID]'),
            'FTPUserPRefix'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue','f[CLIENTID]'),
            'ShellUserPrefix'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue','s[CLIENTID]'),
            'WebDavPrefix'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue','w[CLIENTID]'),
            'wmaUrl'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'MLUrl'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'SystemAdminEmail'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'SystemAdminName'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'SMTPHost'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue','localhost'),
            'SMTPPort'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue','25'),
            'SMTPUser'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'SMTPPassword'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'SMTPSSL'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'defaultMailServer'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'default1DnsServer'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'default2DnsServer'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'default3DnsServer'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'default4DnsServer'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'RegisterDomainHtml'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'CompanyName'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'CustomTextLoginPage'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'CustomLinkLoginPage'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'DashboardAtomAdmin'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'DashboardAtomReseller'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'CustNoTemplate'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'CustomerNumberStart'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'CustomerNumberCounter'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'MinPasswordLength'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
            'MinPasswordStrength'=>array('\Mjr\Library\EntitiesBundle\Config\StringValue',NULL),
        );
        $settings = array();
        foreach($list as $id=>$value)
        {
            if(!$this->get('mjr_library_entities.config')->SettingExists($id))
            {
                $class = $value[0];
                $this->get('mjr_library_entities.config')->createSetting($id,$value[1],$value[0],'core');
                $settings[$id] = $value[1];
            }
            else
            {
                $settings[$id] = $this->get('mjr_library_entities.config')->getSetting($id);
            }
        }
        return array(
            'settings'=>$settings,
            'subtree_navigation'=>'system',
            'subtree_entry'=>'',
            'subtree_menu'=>'system_system_interface',
        );
    }

    /**
     * @Route("/System/Interface/Save", name="system_system_interface_save")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function saveAction(Request $request)
    {
        $settings = $request->request->all();
        $flags = array(
            'FlagpmaEnabledList'=>true,
            'FlagpmaEnabledSite'=>true,
            'FlagpgaEnabledList'=>true,
            'FlagpgaEnabledSite'=>true,
            'FlagwftpEnabledList'=>true,
            'FlagwftpEnabledSite'=>true,
            'FlagmdaEnabledList'=>true,
            'FlagmdaEnabledSite'=>true,
            'FlagrcpEnabledList'=>true,
            'FlagrcpEnabledSite'=>true,
            'FlagCreateSubdomainSite'=>true,
            'FlagCreateAliasSite'=>true,
            'FlagBackupFileQuota'=>true,
            'FlagResellerSiteOption'=>true,
            'FlagMailCustomLogin'=>true,
            'FlagAccountAutoRespondDetails'=>true,
            'FlagCustomMailFilterInDetails'=>true,
            'FlagwmaEnabledList'=>true,
            'FlagwmaEnabledSite'=>true,
            'FlagMLinList'=>true,
            'FlagUserDomainRegistry'=>true,
            'FlaguseLoadIndicator'=>true,
            'FlagMaintenanceMode'=>true,
        );
        foreach($settings as $id=>$value)
        {
            if($this->get('mjr_library_entities.config')->SettingExists($id))
            {
                $this->get('mjr_library_entities.config')->setSetting($id,$value);
                if(isset($flags[$id]))
                {
                    unset($flags[$id]);
                }
            }
        }
        foreach($flags as $flag=>$value)
        {
            $this->get('mjr_library_entities.config')->setSetting($flag,false);
        }
        $this->get('mjr_library_entities.config')->save();
        return $this->redirectToRoute('system_system_interface');
    }
}
