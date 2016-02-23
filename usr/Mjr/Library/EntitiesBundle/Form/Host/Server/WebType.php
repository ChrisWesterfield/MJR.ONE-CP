<?php

namespace Mjr\Library\EntitiesBundle\Form\Host\Server;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class WebType
 * @package Mjr\Library\EntitiesBundle\Form\Host\Server
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class WebType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('BaseDirectory',TextType::class)
            ->add('Path',TextType::class)
            ->add('SymLinks',TextType::class)
            ->add('CreateRelativeSymLinks',CheckboxType::class)
            ->add('NetworkFileSystem',CheckboxType::class)
            ->add('WebsiteAutoAlias',TextType::class)
            ->add('vHostConfigFilePath',TextType::class)
            ->add('vHostConfigFileEnabledPath',TextType::class)
            ->add('SecurityLevel',ChoiceType::class,array(
                    'choices'=>array(
                        'Medium'=>1,
                        'High'=>2,
                    )
                )
            )
            ->add('RewriteIpv6OnMirror',CheckboxType::class)
            ->add('WebUser',TextType::class)
            ->add('WebUserGroup',TextType::class)
            ->add('IpAddressWildCard',CheckboxType::class)
            ->add('TestConfigurationRestart',CheckboxType::class)
            ->add('EnableWildCard',CheckboxType::class)
            ->add('SendOverTrafficNotificationToAdmin',CheckboxType::class)
            ->add('SendOverTrafficNotificationToClient',CheckboxType::class)
            ->add('SendQuotaWarningsToAdmin',CheckboxType::class)
            ->add('SendQuotaWarningToClient',CheckboxType::class)
            ->add('SendDbQuotaWarningToAdmin',CheckboxType::class)
            ->add('SendDbQuotaWarningToClient',CheckboxType::class)
            ->add('SendQuotaWarningEachDays',TextType::class)
            ->add('SendQuotaOkToClient',CheckboxType::class)
            ->add('EnableSni',CheckboxType::class)
            ->add('SpdyAvailable',CheckboxType::class)
            ->add('CaPath',TextType::class)
            ->add('CaPassPhrase',TextType::class)
            ->add('SetFolderPermissionsOnUpdate',CheckboxType::class)
            ->add('MakeWebFolrderImmutable',CheckboxType::class)
            ->add('AddWebUsersToSshUserGroup',CheckboxType::class)
            ->add('ConnectLinuxUserIdToWebId',CheckboxType::class)
            ->add('StartIdForUserIdWebIdConnection',TextType::class)
            ->add('ApachePhpIniPath',TextType::class)
            ->add('CgiPhpIniPath',TextType::class)
            ->add('PhpFpmInitScript',TextType::class)
            ->add('PhpFpmPoolDirectory',TextType::class)
            ->add('PhpFpmStartPort',TextType::class)
            ->add('PhpFpmSocketDirectory',TextType::class)
            ->add('PhpOpenBaseDirectory',TextType::class)
            ->add('CheckPhpIniForChangesInMinutes',TextType::class)
            ->add('DefaultPhpHandler',ChoiceType::class,array(
                    'choices'=>array(
                        'Disabled'  =>1,
                        'Fast-CGI'  =>2,
                        'CGI'       =>3,
                        'Mod-PHP'   =>4,
                        'SuPHP'     =>5,
                        'PHP-FPM'   =>6,
                        'HHVM'      =>7
                    )
                )
            )
            ->add('AppvHostEnabled',CheckboxType::class)
            ->add('AppvHostPort',TextType::class)
            ->add('AppvHostIpAddress',TextType::class)
            ->add('AppvHostDomainName',TextType::class)
            ->add('AwStatsConfFolder',TextType::class)
            ->add('AwStatsDataFolder',TextType::class)
            ->add('AwStatsPlScript',TextType::class)
            ->add('AwStatsBuildStaticPagesPlScript',TextType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\Server\Web'
        ));
    }
}
