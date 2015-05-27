<?php

namespace AppBundle\Controller\compras;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\ComprasProductos;
use AppBundle\Form\ComprasProductosType;
use AppBundle\Entity\ComprasOrdenesProductos;
use AppBundle\Entity\ComprasOrdenes;
use AppBundle\Entity\ComprasOrdenesComentarios;

/**
 * ComprasProductos controller.
 *
 */
class ComprasOrdenesController extends Controller {

    function verAction(Request $request, $orden) {
        
        if ($request->getMethod() === "POST")
        {
            var_dump($request->request->all());
        }
        
        $em = $this->getDoctrine()->getManager();
        $data = [];
        
        $compras = $this->get('compras');
        /* @var $compras \AppBundle\Controller\compras\ServicioComprasController */
        
        $data['orden'] = $aDetalleCompra = $compras->getDetalleOrdenCompra($orden);
        $data['compradores'] = $em->createQuery("SELECT e FROM AppBundle:Empleados e JOIN e.roles r WHERE r IN (:ROLES)")
                ->setParameter('ROLES',array(7)) // 'ROLE_COMPRADOR'
                ->getResult();
        
        return $this->render('AppBundle:ComprasOrdenes:ver.html.twig', ['data' => $data]);
    }

}
