<?php

namespace Mjr\Library\EntitiesBundle\Form\Dns;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ZoneTemplateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Description')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Owner')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Dns\ZoneTemplate'
        ));
    }
}