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
class ComprasIngresoController extends Controller {

    public function seleccionarSucursalAction() {
        // Obtener todas las sucursales accesibles para este usuario

        $em = $this->getDoctrine()->getManager();
        $data = [];

        $data['mapeo'] = $em->createQuery('SELECT e FROM AppBundle:Empleados e JOIN AppBundle:Sucursales s WHERE e = :empleados_id')
                ->setParameter('empleados_id', $this->getUser())
                ->getSingleResult();

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

    public function guardarProductosAction(Request $request) {
        $data = [];

        if ($request->getMethod() != 'POST') {
            return $this->redirectToRoute('compras_ingreso__seleccionar_sucursal');
        }

        $em = $this->getDoctrine()->getManager();

        // Le establecemos el estado 1: "Pendiente revisión"       
        $estado = $em->getRepository('AppBundle:ComprasOrdenesEstados')->find(1);
        
        $dOrden = new ComprasOrdenes();
        $dOrden->setIngresadoDt(new \DateTime());
        $dOrden->setSucursal($em->getRepository('AppBundle:Sucursales')->find($request->get('sucursal')));
        $dOrden->setEstado($estado);
        $dOrden->setCreadoPor($this->getUser());
        $em->persist($dOrden);
        $em->flush();
        
        // Agregamos el comentario
        $dOrdenComentario = new ComprasOrdenesComentarios();
        $dOrdenComentario->setComentario("Orden de compra ingresa vía web");
        $dOrdenComentario->setEstado($estado);
        $dOrdenComentario->setCreadoPor($this->getUser());
        $em->persist($dOrdenComentario);
        $em->flush();
        
        foreach ($request->get('producto') as $producto => $cantidad) {
            $dOrdenProducto = new ComprasOrdenesProductos();
            $dProducto = $em->getRepository('AppBundle:ComprasProductos')->find($producto);
            $dProductoSucursal = $em->getRepository('AppBundle:ComprasProductosSucursales')->findOneBy(['sucursal' => $request->get('sucursal'), 'producto' => $dProducto->getId()]);
            $cantidad = (float) $cantidad;

            $dOrdenProducto->setOrden($dOrden);
            $dOrdenProducto->setProducto($dProducto);
            $dOrdenProducto->setCantidadSugerida($dProductoSucursal->getCantidadPromedio());
            $dOrdenProducto->setCantidadSolicitada($cantidad);
            $dOrdenProducto->setCantidadAprobada(0.00);
            $dOrdenProducto->setCantidad(0.00);
            $dOrdenProducto->setUnidad($dProducto->getUnidad());
                    
            $em->persist($dOrdenProducto);
        }

        $em->flush();

        
        $this->sendNotification($dOrden->getId());

        return $this->render('AppBundle:ComprasIngreso:GuardarProductos.html.twig', ['data' => $data]);
    }

    private function sendNotification($iOrden) {
        $mailer = $this->get('mailer');
        /* @var $mailer \Swift_Message */
        $compras = $this->get('compras');
        /* @var $compras \AppBundle\Controller\compras\ServicioComprasController */

        $orden = $compras->getDetalleOrdenCompra($iOrden);

        $message = $mailer->createMessage()
                ->setFrom('info@lapizzeria.com')
                ->setSubject('Nueva orden de compra!')
                ->setTo('vladimiroski@gmail.com')
                ->setBody(
                $this->renderView(
                        'AppBundle:Correos:enviarOrden.html.twig', array('orden' => $orden)
                ), 'text/html'
        );
        $mailer->send($message);
    }

}