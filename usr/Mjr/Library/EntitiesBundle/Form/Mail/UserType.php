<?php

namespace Mjr\Library\EntitiesBundle\Form\Mail;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserType
 * @package Mjr\Library\EntitiesBundle\Form\Mail
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Email')
            ->add('Login')
            ->add('Password')
            ->add('Name')
            ->add('Uid')
            ->add('Gid')
            ->add('MailDir')
            ->add('MailDirFormat')
            ->add('Quota')
            ->add('CC')
            ->add('SenderCC')
            ->add('HomeDir')
            ->add('AutoResponder')
            ->add('AutoResponderStartDate', 'datetime')
            ->add('AutoResponderEndDate', 'datetime')
            ->add('AutoRepsonderText')
            ->add('MoveJunk')
            ->add('CustomMailFilter')
            ->add('Postfix')
            ->add('GreyListing')
            ->add('Access')
            ->add('DisableImap')
            ->add('DisablePop3')
            ->add('DisableDeliver')
            ->add('DisableSmtp')
            ->add('DisableSieve')
            ->add('DisableFilter')
            ->add('DisableLDA')
            ->add('DisableLmtp')
            ->add('DisableDoveAdm')
            ->add('LastQuotaNotification', 'date')
            ->add('BackupInterval')
            ->add('BackupCopies')
            ->add('Domain')
            ->add('SystemUserId')
            ->add('SystemGroupId')
            ->add('Server')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Mail\User'
        ));
    }
}
