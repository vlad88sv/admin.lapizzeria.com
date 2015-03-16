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
class ComprasProductosSucursalesController extends Controller {

    public function indexAction(Request $request, $producto) {
        $data = [];
        $em = $this->getDoctrine()->getManager();
        $data['flag']['guardado'] = false;
        
        if ($request->getMethod() === 'POST') {
            
            $producto = $em->getRepository('AppBundle:ComprasProductos')->find($producto);

            foreach ($request->get('cantidad', []) as $sucursal => $cantidad) {

                if (!$dProductoSucursal = $em->getRepository('AppBundle:ComprasProductosSucursales')->findOneBy(array('producto' => $producto, 'sucursal' => $sucursal))) {
                    $dProductoSucursal = new \AppBundle\Entity\ComprasProductosSucursales();
                }

                $dProductoSucursal->setCantidadPromedio($cantidad);
                $dProductoSucursal->setSucursal($em->getRepository('AppBundle:Sucursales')->find($sucursal));
                $dProductoSucursal->setProducto($producto);
                $em->persist($dProductoSucursal);
            }
            $em->flush();
            $data['flag']['guardado'] = true;
        }       

        // Obtenes todos los datos para el producto
        $data['p'] = $em->createQuery('SELECT p FROM AppBundle:ComprasProductos p WHERE p.id = :producto')->setParameter('producto', $producto)->getSingleResult();
        $data['cps'] = $em->createQuery('SELECT s,ps FROM AppBundle:Sucursales s LEFT JOIN AppBundle:ComprasProductosSucursales ps WITH s.id = ps.sucursal AND ps.producto = :producto')
                ->setParameter('producto', $data['p']->getId())
                ->getScalarResult();
        //$data['test'] = $em->createQuery('SELECT s FROM AppBundle:Sucursales s LEFT JOIN s.ComprasProductosSucursales ps')->getScalarResult();

        return $this->render('AppBundle:ComprasProductosSucursales:index.html.twig', ['data' => $data]);
    }

}
