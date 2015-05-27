<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        /* $compras = $this->get('compras'); */
        /* @var $compras \AppBundle\Controller\compras\ServicioComprasController */        
        
        $data = [];
        
        // Encontremos las ordenes cuyo estado sea diferente a 15: "Orden cerrada"
        $dSql = "SELECT com FROM AppBundle:ComprasOrdenesComentarios com JOIN AppBundle:ComprasOrdenes co WITH com.orden = co.id AND com.estado = co.estado AND co.estado <> 15 ORDER BY co.sucursal ASC, co.ingresadoDt ASC";
        $data['ordenes'] = $em->createQuery($dSql)->getResult();
        
        return $this->render('AppBundle:default:index.html.twig', ['data' => $data]);
    }
}
