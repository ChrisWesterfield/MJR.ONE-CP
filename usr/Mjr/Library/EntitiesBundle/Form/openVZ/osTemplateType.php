<?php

namespace Mjr\Library\EntitiesBundle\Form\openVZ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class osTemplateType
 * @package Mjr\Library\EntitiesBundle\Form\openVZ
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class osTemplateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('AllServers')
            ->add('Description')
            ->add('Name')
            ->add('File')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('active')
            ->add('SystemGroupId')
            ->add('SystemUserId')
            ->add('CreatedBy')
            ->add('UpdatedBy')
            ->add('Server')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\openVZ\osTemplate'
        ));
    }
}
