<?php

namespace Mjr\Library\EntitiesBundle\Form\System;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DirectoryStructureType
 * @package Mjr\Library\EntitiesBundle\Form\System
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class DirectoryStructureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('function')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('active')
            ->add('Left')
            ->add('Level')
            ->add('Right')
            ->add('Root')
            ->add('SortingPosition')
            ->add('SortingCategory')
            ->add('parent')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\System\DirectoryStructure'
        ));
    }
}
