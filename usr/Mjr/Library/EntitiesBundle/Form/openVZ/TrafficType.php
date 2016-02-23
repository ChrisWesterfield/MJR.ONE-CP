<?php

namespace Mjr\Library\EntitiesBundle\Form\openVZ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class TrafficType
 * @package Mjr\Library\EntitiesBundle\Form\openVZ
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class TrafficType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('TrafficDate', 'datetime')
            ->add('TrafficBytes')
            ->add('Veid')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\openVZ\Traffic'
        ));
    }
}
