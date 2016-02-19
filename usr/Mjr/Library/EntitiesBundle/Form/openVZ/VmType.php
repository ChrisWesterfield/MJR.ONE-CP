<?php

namespace Mjr\Library\EntitiesBundle\Form\openVZ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VmType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Veid')
            ->add('Hostname')
            ->add('Password')
            ->add('StartBoot')
            ->add('ActiveUntilDate', 'datetime')
            ->add('Description')
            ->add('DiskSpace')
            ->add('Traffic')
            ->add('Bandwith')
            ->add('Ram')
            ->add('RamBurst')
            ->add('CpuUnits')
            ->add('CpuNum')
            ->add('CpuLimit')
            ->add('IoPriority')
            ->add('NameServer')
            ->add('Capability')
            ->add('Features')
            ->add('IpTables')
            ->add('Config')
            ->add('Custom')
            ->add('active')
            ->add('Template')
            ->add('OsTemplate')
            ->add('SystemUserId')
            ->add('SystemGroupId')
            ->add('Server')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\openVZ\Vm'
        ));
    }
}
