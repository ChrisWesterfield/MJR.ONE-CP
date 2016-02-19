<?php

namespace Mjr\Library\EntitiesBundle\Form\Host;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MainType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Mail')
            ->add('Web')
            ->add('Dns')
            ->add('File')
            ->add('mysql')
            ->add('pgsql')
            ->add('memcached')
            ->add('mongodb')
            ->add('proxy')
            ->add('vserver')
            ->add('firewall')
            ->add('xmpp')
            ->add('updated')
            ->add('Active')
            ->add('created', 'datetime')
            ->add('ConfigServer')
            ->add('ConfigCron')
            ->add('ConfigDns')
            ->add('ConfigFastCgi')
            ->add('ConfigJailKit')
            ->add('ConfigMail')
            ->add('ConfigMonitoring')
            ->add('ConfigWeb')
            ->add('ConfigXmpp')
            ->add('mirrorServer')
            ->add('SystemGroupId')
            ->add('SystemUserId')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\Main'
        ));
    }
}
