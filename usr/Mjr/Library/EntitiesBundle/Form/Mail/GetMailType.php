<?php

namespace Mjr\Library\EntitiesBundle\Form\Mail;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetMailType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Type')
            ->add('SourceServer')
            ->add('SourceUsername')
            ->add('SourcePassword')
            ->add('SourceDelete')
            ->add('SourceReadAll')
            ->add('Destination')
            ->add('active')
            ->add('Domain')
            ->add('Server')
            ->add('SystemGroupId')
            ->add('SystemUserId')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Mail\GetMail'
        ));
    }
}
