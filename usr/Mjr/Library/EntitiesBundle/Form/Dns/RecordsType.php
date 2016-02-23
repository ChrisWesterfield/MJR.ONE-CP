<?php

namespace Mjr\Library\EntitiesBundle\Form\Dns;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RecordsType
 * @package Mjr\Library\EntitiesBundle\Form\Dns
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class RecordsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Type')
            ->add('content')
            ->add('Ttl')
            ->add('Priority')
            ->add('ChangeDate')
            ->add('Disabled')
            ->add('Ordername')
            ->add('Auth')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Domain')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Dns\Records'
        ));
    }
}
