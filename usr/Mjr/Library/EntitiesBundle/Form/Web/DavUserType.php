<?php

namespace Mjr\Library\EntitiesBundle\Form\Web;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DavUserType
 * @package Mjr\Library\EntitiesBundle\Form\Web
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class DavUserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Username')
            ->add('Prefix')
            ->add('Password')
            ->add('Dir')
            ->add('active')
            ->add('ParentDomain')
            ->add('Server')
            ->add('SystemUserId')
            ->add('SystemGroupId')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Web\DavUser'
        ));
    }
}
