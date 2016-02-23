<?php

namespace Mjr\Library\EntitiesBundle\Form\Web;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class BackupType
 * @package Mjr\Library\EntitiesBundle\Form\Web
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class BackupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('BackupType')
            ->add('BackupMode')
            ->add('FileName')
            ->add('FileSize')
            ->add('active')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('ParentDomain')
            ->add('Server')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Web\Backup'
        ));
    }
}
