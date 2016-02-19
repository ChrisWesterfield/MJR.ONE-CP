<?php

namespace Mjr\Library\EntitiesBundle\Form\Host;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IpType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('Address')
            ->add('VirtualHost')
            ->add('Ports')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('SystemGroupId')
            ->add('SystemUserId')
            ->add('Customer')
            ->add('CreatedBy')
            ->add('UpdatedBy')
            ->add('Server')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\Ip'
        ));
    }
}
