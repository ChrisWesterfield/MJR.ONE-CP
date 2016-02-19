<?php

namespace Mjr\Library\EntitiesBundle\Form\Host;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhpVersionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('FastCgiBinary')
            ->add('FastCgiIniDir')
            ->add('FpmInitScript')
            ->add('FpmIniDir')
            ->add('FpmPoolDir')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Server')
            ->add('SystemGroupId')
            ->add('SystemUserId')
            ->add('Customer')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\PhpVersion'
        ));
    }
}
