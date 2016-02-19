<?php

namespace Mjr\Library\EntitiesBundle\Form\CustomerTemplate;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WebsiteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('phpDisabled')
            ->add('phpFastCGI')
            ->add('phpCGI')
            ->add('phpMod')
            ->add('phpSu')
            ->add('phpFPM')
            ->add('Cgi')
            ->add('Ssi')
            ->add('Perl')
            ->add('Ruby')
            ->add('Python')
            ->add('SuExec')
            ->add('ownError')
            ->add('wildcard')
            ->add('ssl')
            ->add('letsEncrypt')
            ->add('maxStorage')
            ->add('maxTraffic')
            ->add('maxWebDomains')
            ->add('maxAliasDomain')
            ->add('maxSubDomain')
            ->add('maxFTP')
            ->add('maxWebDav')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Customer')
            ->add('defaultHost')
            ->add('hosts')
            ->add('CreatedBy')
            ->add('UpdatedBy')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Website'
        ));
    }
}
