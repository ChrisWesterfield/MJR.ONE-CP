<?php

namespace Mjr\Library\EntitiesBundle\Form\Web;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DatabaseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Type')
            ->add('Name')
            ->add('Prefix')
            ->add('Quota')
            ->add('LastQuotaNotification', 'datetime')
            ->add('CharacterSet')
            ->add('RemoteAccess')
            ->add('RemoteIps')
            ->add('BackupInterval')
            ->add('BackupCopies')
            ->add('active')
            ->add('ParentDomain')
            ->add('Users')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Web\Database'
        ));
    }
}
