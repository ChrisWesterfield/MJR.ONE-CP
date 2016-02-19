<?php

namespace Mjr\Library\EntitiesBundle\Form\CustomerTemplate;

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
            ->add('Reseller')
            ->add('maxAps')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Website')
            ->add('Mail')
            ->add('Dns')
            ->add('Database')
            ->add('System')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Main'
        ));
    }
}
