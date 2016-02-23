<?php

namespace Mjr\Library\EntitiesBundle\Form\CustomerTemplate;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DatabaseType
 * @package Mjr\Library\EntitiesBundle\Form\CustomerTemplate
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class DatabaseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxUsers')
            ->add('maxDatabases')
            ->add('hasMysql')
            ->add('hasPgSQL')
            ->add('hasMongoDb')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\CustomerTemplate\Database'
        ));
    }
}
