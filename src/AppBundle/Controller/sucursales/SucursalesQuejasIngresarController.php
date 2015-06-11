<?php

namespace AppBundle\Controller\sucursales;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\SucursalesQuejas;
use AppBundle\Form\SucursalesQuejasIngresarType;
/**
 * SucursalesQuejas controller.
 *
 */
class SucursalesQuejasIngresarController extends Controller
{

    /**
     * Lists all SucursalesQuejas entities.
     *
     */
    public function indexAction(Request $request)
    {
        $entity = new SucursalesQuejas();
        $builder = $this->createFormBuilder($entity);
        $builder
            ->add('sucursal', null, array('label' => 'Sucursal reportada'))
            ->add('gerente', null, array('label' => 'Gerente reportado'))
            ->add('queja', null, array('label' => 'Queja registrada'))
            ->add('solucion', null, array('label' => 'Solución tomada'))
            ->add('submit', 'submit', array('label' => 'Registrar queja'));
        ;        
        
        $form = $builder->getForm();
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setIngresadoPor($this->getUser());
            $entity->setNota(-1); // pendiente de calificar
            $entity->setClienteReportoPrimero(false);
            $entity->setHoraRegistro(new \DateTime());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sucursales_quejas_gracias'));
        }

        return $this->render('AppBundle:SucursalesQuejasIngresar:index.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

}
