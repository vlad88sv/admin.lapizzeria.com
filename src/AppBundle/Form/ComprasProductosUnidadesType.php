<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComprasProductosUnidadesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('abreviatura')
            ->add('nombreSingular')
            ->add('nombrePlural')
            ->add('activo', 'choice', ['label' => 'Activo', 'choices' => [1 => 'si', 0 => 'no']])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ComprasProductosUnidades'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_comprasproductosunidades';
    }
}
