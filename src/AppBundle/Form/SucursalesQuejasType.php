<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SucursalesQuejasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sucursal', null, array('label' => 'Sucursal reportada'))
            ->add('gerente', null, array('label' => 'Gerente reportado'))
            ->add('queja', null, array('label' => 'Queja registrada'))
            ->add('solucion', null, array('label' => 'Solución tomada'))
            ->add('nota', null, array('label' => 'Nota de la acción'))
            ->add('ingresadoPor', null, array('label' => 'Ingresado por'))
            ->add('horaRegistro', null, array('label' => 'Hora de registro'))
            ->add('clienteReportoPrimero', null, array('label' => 'Cliente reportó primero'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\SucursalesQuejas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_sucursalesquejas';
    }
}
