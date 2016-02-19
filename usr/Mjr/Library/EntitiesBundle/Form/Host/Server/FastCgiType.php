<?php

namespace Mjr\Library\EntitiesBundle\Form\Host\Server;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FastCgiType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FastCgiStarterPath',TextType::class)
            ->add('FastCgiStarterScript',TextType::class)
            ->add('FastCgiAlias',TextType::class)
            ->add('FastCgiPhpIniPath',TextType::class)
            ->add('FastCgiChildren',TextType::class)
            ->add('FastCgiMaxRequests',TextType::class)
            ->add('FastCgiBin',TextType::class)
            ->add('FastCgiConfigSyntax',ChoiceType::class,array(
                    'choices'=>array(
                        'Old (apache 2.0)'=>1,
                        'New (apache 2.2)'=>2,
                    )
                )
            )
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\Server\FastCgi'
            )
        );
    }
}
