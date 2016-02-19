<?php

namespace Mjr\Library\EntitiesBundle\Form\Ftp;

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
            ->add('Username')
            ->add('UserPrefix')
            ->add('Password')
            ->add('QuotaSize')
            ->add('UserId')
            ->add('GroupId')
            ->add('Directory')
            ->add('QuotaFiles')
            ->add('UploadRatio')
            ->add('DownloadRatio')
            ->add('UploadBandwith')
            ->add('DownloadBandwith')
            ->add('Expires', 'datetime')
            ->add('active')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Domain')
            ->add('SystemGroupId')
            ->add('SystemUserId')
            ->add('Server')
            ->add('CreatedBy')
            ->add('UpdatedBy')
            ->add('Customer')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Ftp\User'
        ));
    }
}
