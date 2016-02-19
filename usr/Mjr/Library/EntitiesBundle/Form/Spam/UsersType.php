<?php

namespace Mjr\Library\EntitiesBundle\Form\Spam;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Priority')
            ->add('Email')
            ->add('Fullname')
            ->add('Local')
            ->add('active')
            ->add('Policy')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Spam\Users'
        ));
    }
}