<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComprasProductosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, ['label' => 'Nombre de producto'])
            ->add('descripcion', null, ['label' => 'Descripción', 'required' => 'false'])
            ->add('proveedor', null, ['label' => 'Proveedor'])
            ->add('unidad', null, ['label' => 'Unidad de medida por defecto'])
            ->add('activo', 'choice', ['label' => 'Activo', 'choices' => [1 => 'si', 0 => 'no']])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ComprasProductos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_comprasproductos';
    }
}
