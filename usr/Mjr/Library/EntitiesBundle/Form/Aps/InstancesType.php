<?php

namespace Mjr\Library\EntitiesBundle\Form\Aps;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class InstancesType
 * @package Mjr\Library\EntitiesBundle\Form\Aps
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class InstancesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('InstanceStatus')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('InstanceSettings')
            ->add('Package')
            ->add('SystemGroupId')
            ->add('SystemUserId')
            ->add('Server')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Aps\Instances'
        ));
    }
}
