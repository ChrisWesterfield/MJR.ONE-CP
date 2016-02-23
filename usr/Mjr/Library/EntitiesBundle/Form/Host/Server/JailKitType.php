<?php

namespace Mjr\Library\EntitiesBundle\Form\Host\Server;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class JailKitType
 * @package Mjr\Library\EntitiesBundle\Form\Host\Server
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class JailKitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ChrootHome',TextType::class)
            ->add('ChrootAppSections',TextareaType::class)
            ->add('ChrootedApplications',TextareaType::class)
            ->add('ChrootedCronApplications',TextareaType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\Server\JailKit'
        ));
    }
}
