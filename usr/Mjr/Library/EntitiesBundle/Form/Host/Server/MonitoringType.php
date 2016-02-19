<?php

namespace Mjr\Library\EntitiesBundle\Form\Host\Server;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonitoringType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('EnableServiceMonitoringAndRestartOnFailure',CheckboxType::class)
            ->add('DisableHttpdMonitoring',CheckboxType::class)
            ->add('DisableMongoDbMonioring',CheckboxType::class)
            ->add('DisableMySQLMonitoring',CheckboxType::class)
            ->add('DisablePostgresqlMonitoring',CheckboxType::class)
            ->add('DisableFtpDaemonMonitoring',CheckboxType::class)
            ->add('DisableSshMonitoring',CheckboxType::class)
            ->add('DisableSMTPMonitoring',CheckboxType::class)
            ->add('DisableMailDeamonMonitoring',CheckboxType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\Server\Monitoring'
        ));
    }
}
