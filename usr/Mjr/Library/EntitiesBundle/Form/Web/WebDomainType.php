<?php

namespace Mjr\Library\EntitiesBundle\Form\Web;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class WebDomainType
 * @package Mjr\Library\EntitiesBundle\Form\Web
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class WebDomainType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DomainString')
            ->add('Type')
            ->add('VhostType')
            ->add('WebFolder')
            ->add('DocumentRoot')
            ->add('SystemUser')
            ->add('SystemGroup')
            ->add('HdQuota')
            ->add('TrafficQuota')
            ->add('SubDomain')
            ->add('PhpType')
            ->add('RedirectType')
            ->add('RedirectPath')
            ->add('SeoRedirect')
            ->add('StatsPassword')
            ->add('PmType')
            ->add('PmMaxChildren')
            ->add('PmStartServers')
            ->add('PmMinSpareServers')
            ->add('PmMaxSpareServers')
            ->add('PmProcessIdleTimeOut')
            ->add('PmMaxRequests')
            ->add('PhpOpenBaseDir')
            ->add('CustomPhpIni')
            ->add('BackupInterval')
            ->add('BackupCopies')
            ->add('BackupExclude')
            ->add('HttpPort')
            ->add('HttpsPort')
            ->add('FlagCgi')
            ->add('FlagSsi')
            ->add('FlagSuExec')
            ->add('FlagErrorDocs')
            ->add('FlagSubDomainWww')
            ->add('FlagPhp')
            ->add('FlagRuby')
            ->add('FlagPerl')
            ->add('FlagRewriteToHttps')
            ->add('FlagSSl')
            ->add('FlagLetsEncrypt')
            ->add('FlagTrafficQuotaLog')
            ->add('FlagSpdy')
            ->add('FlagPageSpeed')
            ->add('ApacheDirectives')
            ->add('NginxDirectives')
            ->add('ProxyDirectives')
            ->add('FolderDirectives')
            ->add('RewriteRules')
            ->add('active')
            ->add('IpV4Address')
            ->add('IpV6Address')
            ->add('Domain')
            ->add('ParentDomain')
            ->add('WebServerDirectives')
            ->add('PhpVersion')
            ->add('SslCertificate')
            ->add('SystemGroupId')
            ->add('SystemUserId')
            ->add('Server')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Web\WebDomain'
        ));
    }
}
