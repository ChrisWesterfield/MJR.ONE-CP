<?php

namespace Mjr\Library\EntitiesBundle\Form\Customer;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class MailType
 * @package Mjr\Library\EntitiesBundle\Form\Customer
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
            ->add('maxEmailDomain')
            ->add('maxEmailMailBox')
            ->add('maxEmailAsias')
            ->add('maxMailList')
            ->add('maxEmailForward')
            ->add('maxEmailCatchall')
            ->add('maxEmailRoute')
            ->add('maxEmailFilter')
            ->add('maxFetchmail')
            ->add('maxSpamFilterLists')
            ->add('maxSpamFilterUser')
            ->add('maxMailPolicy')
            ->add('maxMailStorage')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Customer')
            ->add('defaultHost')
            ->add('hosts')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Customer\Mail'
        ));
    }
}
