<?php

namespace Mjr\Library\EntitiesBundle\Form\Customer;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PaymentType
 * @package Mjr\Library\EntitiesBundle\Form\Customer
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class PaymentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('accountHolder')
            ->add('number')
            ->add('bic')
            ->add('payPalEmail')
            ->add('ccard')
            ->add('secret')
            ->add('validMonth')
            ->add('validYear')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Customer')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Customer\Payment'
        ));
    }
}
