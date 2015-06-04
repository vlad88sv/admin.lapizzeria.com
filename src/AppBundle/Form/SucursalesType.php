<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SucursalesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, ['label' => 'Nombre', 'required' => true])
            ->add('telefono', null, ['label' => 'Teléfono', 'required' => false])
            ->add('direccion', null, ['label' => 'Dirección', 'required' => false])
            ->add('wsServUrl', null, ['label' => 'WS SERV URL', 'required' => false])
            ->add('activo', null, ['label' => 'Activo', 'required' => false])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Sucursales'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_sucursales';
    }
}
