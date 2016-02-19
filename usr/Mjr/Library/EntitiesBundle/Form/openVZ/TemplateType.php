<?php

namespace Mjr\Library\EntitiesBundle\Form\openVZ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TemplateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Diskspace')
            ->add('Traffic')
            ->add('Bandwith')
            ->add('Ram')
            ->add('RamBurst')
            ->add('CpuUnits')
            ->add('CpuLimit')
            ->add('CpuNum')
            ->add('IoPriority')
            ->add('Description')
            ->add('NumProc')
            ->add('NumTcpSock')
            ->add('NumOtherSock')
            ->add('VmGuarpages')
            ->add('KMemSize')
            ->add('TcpSndBuf')
            ->add('TcpRecvBuf')
            ->add('OtherSockBuf')
            ->add('DGramRcvBuf')
            ->add('OOmGuarPages')
            ->add('PrivVMPages')
            ->add('LockedPages')
            ->add('ShmPages')
            ->add('PhysPages')
            ->add('NumFiles')
            ->add('AvNumProc')
            ->add('NumFLock')
            ->add('Numpty')
            ->add('NumSigInfo')
            ->add('DCacheSize')
            ->add('NumIpTent')
            ->add('SwapPages')
            ->add('Hostname')
            ->add('NameServer')
            ->add('CreateDns')
            ->add('Capability')
            ->add('Features')
            ->add('IpTables')
            ->add('Custom')
            ->add('active')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('SystemGroupId')
            ->add('SystemUserId')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\openVZ\Template'
        ));
    }
}
