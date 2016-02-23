<?php

namespace Mjr\Library\EntitiesBundle\Form\MailTemplate;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CustomerType
 * @package Mjr\Library\EntitiesBundle\Form\MailTemplate
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class CustomerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('name')
            ->add('subject')
            ->add('message')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('CreatedBy')
            ->add('UpdatedBy')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\MailTemplate\Customer'
        ));
    }
}
