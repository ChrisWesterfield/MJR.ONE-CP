<?php

namespace Mjr\Library\EntitiesBundle\Form\Software;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepositoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Url')
            ->add('Username')
            ->add('Password')
            ->add('active')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Software\Repository'
        ));
    }
}