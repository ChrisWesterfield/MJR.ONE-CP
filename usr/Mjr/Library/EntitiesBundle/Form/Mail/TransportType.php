<?php

namespace Mjr\Library\EntitiesBundle\Form\Mail;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransportType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Transport')
            ->add('SortOrder')
            ->add('active')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Domain')
            ->add('SystemGroupId')
            ->add('SystemUserId')
            ->add('Server')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Mail\Transport'
        ));
    }
}