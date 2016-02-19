<?php

namespace Mjr\Library\EntitiesBundle\Form\Host\Server;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('VloggerConfigDirectory',TextType::class)
            ->add('NetworkConfig',CheckboxType::class)
            ->add('IpAddress',TextType::class)
            ->add('Netmask',TextType::class)
            ->add('IpV6Prefix',TextType::class)
            ->add('Gateway',TextType::class)
            ->add('Hostname',TextType::class)
            ->add('NameServers',TextType::class)
            ->add('FireWall',ChoiceType::class,array(
                    'choices'=>array(
                        'bastile'=>1,
                        'ufw'=>2,
                    )
                )
            )
            ->add('LogLevel',ChoiceType::class,array(
                    'choices'=>array(
                        'Debug'     =>1,
                        'Warnings'  =>2,
                        'Errors'    =>3
                    )
                )
            )
            ->add('Warnings',ChoiceType::class,array(
                    'choices'=>array(
                        'Debug'     =>1,
                        'Warnings'  =>2,
                        'Errors'    =>3
                    )
                )
            )
            ->add('BackupDirectory',TextType::class)
            ->add('BackupDirectoryIsAMount', CheckboxType::class)
            ->add('BackupMode',ChoiceType::class,array(
                    'choices'=>array(
                        'Backup web files owned by web user as zip'=>1,
                        'Backup all files in web directory as root user'=>2,
                    )
                )
            )
            ->add('BackupTime',TextType::class)
            ->add('DeleteBackupOnSiteDelete',TextType::class)
            ->add('CheckForLinuxUpdates', TextType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\Server\Server'
        ));
    }
}
