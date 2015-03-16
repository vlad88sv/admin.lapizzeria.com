<?php

namespace AppBundle\Controller\compras;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\ComprasProductos;
use AppBundle\Form\ComprasProductosType;

/**
 * ComprasProductos controller.
 *
 */
class ComprasIngresoController extends Controller
{
    public function seleccionarSucursalAction() {
        // Obtener todas las sucursales accesibles para este usuario
        
        $em = $this->getDoctrine()->getManager();
        $data = [];
        
        $data['sucursales'] = $em->createQuery('SELECT s FROM AppBundle:Sucursales s ORDER BY s.nombre ASC')->getResult();
        
        return $this->render('AppBundle:ComprasIngreso:seleccionarSucursal.html.twig', ['data' => $data]);
    }
    
    public function seleccionarProductosAction($sucursal) {
        // Obtener todos los productos para la sucursal seleccionada
        
        $em = $this->getDoctrine()->getManager();
        $data = [];
        
        $data['sucursal'] = $em->createQuery('SELECT s FROM AppBundle:Sucursales s WHERE s.id = :sucursal ORDER BY s.nombre ASC')
                ->setParameter('sucursal', $sucursal)
                ->getSingleResult();
        
        $data['productos'] = $em->createQuery('SELECT cps FROM AppBundle:ComprasProductosSucursales cps JOIN AppBundle:ComprasProductos p WHERE cps.sucursal = :sucursal AND cps.producto = p.id AND cps.cantidadPromedio > 0')
                ->setParameter('sucursal', $sucursal)
                ->getResult();
        
        return $this->render('AppBundle:ComprasIngreso:seleccionarProductos.html.twig', ['data' => $data]);
    }
}