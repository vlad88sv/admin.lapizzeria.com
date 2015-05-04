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
class ComprasReportarController extends Controller {

    public function ingresarAction() {
        // Obtener todas las sucursales accesibles para este usuario

        $em = $this->getDoctrine()->getManager();
        $data = [];

        $data['sucursales'] = $em->createQuery('SELECT s FROM AppBundle:Sucursales s ORDER BY s.nombre ASC')->getResult();
        $data['cfp'] = $em->createQuery('SELECT cfp FROM AppBundle:ComprasPagosFormas cfp ORDER BY cfp.nombre ASC')->getResult();
        $data['proveedores'] = $em->createQuery('SELECT p FROM AppBundle:ComprasProveedores p ORDER BY p.nombre ASC')->getResult();

        return $this->render('AppBundle:ComprasReportar:ingresar.html.twig', ['data' => $data]);
    }

    public function guardarAction(Request $request) {
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

        return $this->render('AppBundle:ComprasReportar:ingresar.html.twig', ['data' => $data]);
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