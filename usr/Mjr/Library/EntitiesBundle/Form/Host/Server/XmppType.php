<?php

namespace Mjr\Library\EntitiesBundle\Form\Host\Server;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class XmppType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('UseIpv6',CheckboxType::class)
            ->add('MaxBoshInavtivityTime',TextType::class)
            ->add('ServerAdmins',TextType::class)
            ->add('ServerWideEnabledPlugins',TextType::class)
            ->add('HttpPort',TextType::class)
            ->add('HttpsPort',TextType::class)
            ->add('PasteBinPort',TextType::class)
            ->add('BoshPort',TextType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Host\Server\Xmpp'
        ));
    }
}
