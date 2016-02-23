<?php

namespace Mjr\Library\EntitiesBundle\Form\Host\Server;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DnsType
 * @package Mjr\Library\EntitiesBundle\Form\Host\Server
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class DnsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Daemon',ChoiceType::class,array(
                'choices'=>array(
                    'Bind'=>'bind',
                    'PowerDns'=>'pdns',
                )
            ))
            ->add('BindUser',TextType::class)
            ->add('BindGroup',TextType::class)
            ->add('BindZoneFilesDirectory',TextType::class)
            ->add('BindNamedConfigFilename',TextType::class)
            ->add('BindNamedLocalFileName',TextType::class)
            ->add('DisableBind9MessagesForLogLevelWarning',CheckboxType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\Server\Dns'
        ));
    }
}
