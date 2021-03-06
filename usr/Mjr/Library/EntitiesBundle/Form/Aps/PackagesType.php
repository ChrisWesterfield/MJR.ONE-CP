<?php

namespace Mjr\Library\EntitiesBundle\Form\Aps;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PackagesType
 * @package Mjr\Library\EntitiesBundle\Form\Aps
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class PackagesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Path')
            ->add('Name')
            ->add('Category')
            ->add('Version')
            ->add('Release')
            ->add('PackageUrl')
            ->add('PackageStatus')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Aps\Packages'
        ));
    }
}
