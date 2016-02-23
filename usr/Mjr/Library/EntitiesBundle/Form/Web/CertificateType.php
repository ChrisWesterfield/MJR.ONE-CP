<?php

namespace Mjr\Library\EntitiesBundle\Form\Web;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CertificateType
 * @package Mjr\Library\EntitiesBundle\Form\Web
 * @author Chris Westerfield <chris@westerfield.name>
 * @license MPL v2.0
 * @copyright Chris Westerfield & MJR.ONE
 * @link https://www.mjr.one
 */
class CertificateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('State')
            ->add('City')
            ->add('Organisation')
            ->add('OrganisationUnit')
            ->add('Domain')
            ->add('Request')
            ->add('Cert')
            ->add('Bundle')
            ->add('Key')
            ->add('Action')
            ->add('WildCard')
            ->add('GlobalCertificate')
            ->add('created', 'datetime')
            ->add('updated', 'datetime')
            ->add('active')
            ->add('Country')
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
            'data_class' => 'Mjr\Library\EntitiesBundle\Entity\Web\Certificate'
        ));
    }
}
