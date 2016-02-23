<?php

namespace Mjr\Library\EntitiesBundle\Form\Host\Server;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class MailType
 * @package Mjr\Library\EntitiesBundle\Form\Host\Server
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class MailType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('GetMailConfigDir',TextType::class)
            ->add('Modul',ChoiceType::class,array(
                    'choices'=>array(
                        'postfix_mysql'=>1
                    )
                )
            )
            ->add('MailDirectoryPath',TextType::class)
            ->add('MailDirectoryFormat',ChoiceType::class,array(
                    'choices'=>array(
                        'MailDir'=>1,
                        'MailBox'=>2,
                    )
                )
            )
            ->add('HomeDirectoryPath',TextType::class)
            ->add('DkimPath',TextType::class)
            ->add('DkimStrength',ChoiceType::class,array(
                    'choices'=>array(
                        'weak (1024)'=>1,
                        'normal (2048)'=>2,
                        'strong (4096)'=>3,
                    )
                )
            )
            ->add('MailServerDaemon',ChoiceType::class,array(
                    'choices'=>array(
                        'Courier'=>1,
                        'Dovecot'=>2,
                    )
                )
            )
            ->add('MailFilterSyntax',ChoiceType::class,array(
                    'choices'=>array(
                        'Maildrop'=>1,
                        'Sieve'=>2,
                    )
                )
            )
            ->add('MailUserId',TextType::class)
            ->add('MailUserGroup',TextType::class)
            ->add('UseWebsitesLinuxUidForMailbox',CheckboxType::class)
            ->add('RelayHost',TextType::class)
            ->add('RelayHostUser',TextType::class)
            ->add('RelayHostPassword',TextType::class)
            ->add('RejectSenderAndLoginMismatch', CheckboxType::class)
            ->add('MailboxSizeLimit',TextType::class)
            ->add('MessageSizeLimit',TextType::class)
            ->add('MailBoxQuotaStatistics',CheckboxType::class)
            ->add('RealTimeBlackHoleList',TextType::class)
            ->add('SendQuotaWarningsToAdmin',CheckboxType::class)
            ->add('SendQuotaWarningToClient',CheckboxType::class)
            ->add('SendQuotaWarningEachDays',TextType::class)
            ->add('SendQuotaOkMessageToClient',CheckboxType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\Server\Mail'
        ));
    }
}
