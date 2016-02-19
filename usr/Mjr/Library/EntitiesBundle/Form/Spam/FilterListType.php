<?php

namespace Mjr\Library\EntitiesBundle\Form\Spam;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterListType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('BlackList')
            ->add('WhiteList')
            ->add('Email')
            ->add('Priority')
            ->add('active')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('MailUser')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Spam\FilterList'
        ));
    }
}
