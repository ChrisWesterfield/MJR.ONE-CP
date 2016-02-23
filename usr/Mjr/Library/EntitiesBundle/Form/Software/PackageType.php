<?php

namespace Mjr\Library\EntitiesBundle\Form\Software;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PackageType
 * @package Mjr\Library\EntitiesBundle\Form\Software
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class PackageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Title')
            ->add('Description')
            ->add('Version')
            ->add('Type')
            ->add('Installable')
            ->add('RequiresDb')
            ->add('RemoteFunctions')
            ->add('Key')
            ->add('Config')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Repository')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Software\Package'
        ));
    }
}
