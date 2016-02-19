<?php

namespace Mjr\Library\EntitiesBundle\Form\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('firstname')
            ->add('lastname')
            ->add('Active')
            ->add('Role')
            ->add('CredentialsExpireDate', 'datetime')
            ->add('AccountExpireDate', 'datetime')
            ->add('LastLogin', 'datetime')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Customer')
            ->add('Groups')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\User\User'
        ));
    }
}
