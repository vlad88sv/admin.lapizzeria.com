<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComprasProveedoresType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, ['label' => 'Nombre de proveedor'])
            ->add('contacto', null, ['label' => 'Nombre de contacto', 'required' => false])
            ->add('telefono', null, ['label' => 'Número de teléfono', 'required' => false])
            ->add('direccion', null, ['label' => 'Dirección', 'required' => false])
            ->add('comentarios', null, ['label' => 'Comentarios', 'required' => false, 'empty_data' => ''])
            ->add('activo', 'choice', ['label' => 'Activo', 'choices' => [1 => 'si', 0 => 'no']])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ComprasProveedores'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_comprasproveedores';
    }
}
