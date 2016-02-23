<?php

namespace Mjr\Library\EntitiesBundle\Form\CustomerTemplate;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DnsType
 * @package Mjr\Library\EntitiesBundle\Form\CustomerTemplate
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
            ->add('maxZones')
            ->add('maxDnsEntries')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('Customer')
            ->add('defaultHost')
            ->add('hosts')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Dns'
        ));
    }
}
