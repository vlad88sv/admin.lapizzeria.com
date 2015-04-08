<?php

namespace AppBundle\Controller\compras;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * ComprasProveedores controller.
 *
 */
class servicioComprasController extends Controller {
    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }
    
    public function getDetalleOrdenCompra($id) {
        $detalle = [];
        
        $detalle['orden'] = $this->em->getRepository('AppBundle:ComprasOrdenes')->find($id);
        
        $sDql = 'SELECT cop FROM AppBundle:ComprasOrdenesProductos cop JOIN AppBundle:ComprasProveedores cp WHERE cop.orden = :orden ORDER BY cp.id';
        $detalle['productos'] = $this->em->createQuery($sDql)
                ->setParameter('orden', $id)
                ->getResult();
        
        return $detalle;
    }

}
