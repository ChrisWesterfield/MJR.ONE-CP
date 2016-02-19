<?php

namespace Mjr\Library\EntitiesBundle\Form\Spam;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PolicyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('VirusQuarantineTo')
            ->add('SpamQuarantineTo')
            ->add('BannedQuarantineTo')
            ->add('BadHeaderQuarantineTo')
            ->add('OtherQuarantineTo')
            ->add('AddressExtensionVirus')
            ->add('AddressExtensionSpam')
            ->add('AddressExtensionBanned')
            ->add('AddressExtensionBadHeader')
            ->add('NewVirusAdmin')
            ->add('VirusAdmin')
            ->add('BannedAdmin')
            ->add('BadHeaderAdmin')
            ->add('SpamAdmin')
            ->add('SpamSubjectTag')
            ->add('SpamSubjectTag2')
            ->add('BannedRuleNames')
            ->add('FlagVirusLover')
            ->add('FlagSpamLover')
            ->add('FlagBannedFilesLover')
            ->add('BadHeaderLover')
            ->add('ByPassBannedChecks')
            ->add('ByPassHeaderChecks')
            ->add('SpamModifiesSubject')
            ->add('WarnVirusRecipient')
            ->add('WarnBannedRecipient')
            ->add('WarnBeadHeaderRecipient')
            ->add('PolicyDGreyList')
            ->add('MessageSizeLimit')
            ->add('PolicyDQuotaId')
            ->add('PolicyDQuotaInPeriod')
            ->add('PolicyDQuotaOut')
            ->add('PolicyDQuotaOutPeriod')
            ->add('SpamTagLevel')
            ->add('SpamTag2Level')
            ->add('SpamKillLevel')
            ->add('SpamDsnCutoffLevel')
            ->add('SpamQuarantineCutOffLevel')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Spam\Policy'
        ));
    }
}
