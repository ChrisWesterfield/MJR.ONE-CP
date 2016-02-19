<?php

namespace Mjr\Library\EntitiesBundle\Form\Xmpp;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DomainType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Domain')
            ->add('ManagementMehtod')
            ->add('PublicRegistration')
            ->add('RegistrationUrl')
            ->add('RegistrationMessage')
            ->add('UsePubSub')
            ->add('UseProxy')
            ->add('UseAnonymousHost')
            ->add('UseVJud')
            ->add('VJudOptMode')
            ->add('UseMucHost')
            ->add('MucName')
            ->add('MucRestrictRoomCreation')
            ->add('UsePastebin')
            ->add('PasteBinExpireAfter')
            ->add('PastebinTrigger')
            ->add('UseHttpArchive')
            ->add('UseHttpArchiveShowStatus')
            ->add('UseStatusHost')
            ->add('active')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('SystemDomain')
            ->add('DomainAdmins')
            ->add('MucAdmins')
            ->add('Certificate')
            ->add('SystemUserId')
            ->add('SystemGroupId')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Xmpp\Domain'
        ));
    }
}
