<?php

namespace Mjr\Library\EntitiesBundle\Form\Software;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UpdateType
 * @package Mjr\Library\EntitiesBundle\Form\Software
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class UpdateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Url')
            ->add('Md5')
            ->add('Dependencies')
            ->add('Title')
            ->add('v1')
            ->add('v2')
            ->add('v3')
            ->add('v4')
            ->add('vmjr')
            ->add('Type')
            ->add('Repository')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Software\Update'
        ));
    }
}
