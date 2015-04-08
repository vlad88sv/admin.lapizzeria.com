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
        $data = [];
        
        $compras = $this->get('compras');
        /* @var $compras \AppBundle\Controller\compras\ServicioComprasController */
        
        $data['orden'] = $aDetalleCompra = $compras->getDetalleOrdenCompra($orden);
        
        return $this->render('AppBundle:ComprasOrdenes:ver.html.twig', ['data' => $data]);
    }

}
