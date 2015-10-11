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

        $em = $this->getDoctrine()->getManager();
        $data = [];

        if ($request->getMethod() === "POST") {
            // var_dump($request->request->all());

            foreach ($request->get('cantidad') as $oProducto => $cantidades) {
                $dOrdenProducto = new ComprasOrdenesProductos();
                /* @var $dProducto \AppBundle\Entity\ComprasOrdenesProductos */
                $dProducto = $em->getRepository('AppBundle:ComprasOrdenesProductos')->find($oProducto);
                $cantidad = (float) ($cantidades[3] ?: $cantidades[2] ?: $cantidades[1]);
                $dProducto->setCantidadAprobada($cantidades[3]);
                $dProducto->setCantidad($cantidad);
                $em->persist($dProducto);
            }

            $em->flush();

            /* @var $compras \AppBundle\Controller\compras\ServicioComprasController */
            $compras = $this->get('compras');

            // Orden sobre la cual estamos tomando acción
            /* @var $dOrden \AppBundle\Entity\ComprasOrdenes */
            $dOrden = $em->getRepository('AppBundle:ComprasOrdenes')->find($orden);

            if ($request->get('accion') === 'aprobar') {
                $estado = 4; // Comprador asignado por admin
                $asunto = 'Actualización de orden de compra';
                $titulo = 'Se le ha asignado una nueva orden de compra';
                $mensaje = 'La siguiente orden de compra ha sido asignada a Ud.';
            } else {
                $estado = 2; // Revisada por admin, denegada
                $asunto = 'Actualización de orden de compra rechazada';
                $titulo = 'Se le notifica que esta orden ha sido rechazada';
                $mensaje = 'Un administrador ha rechazado su solicitud de compra. Favor contacte vía telefónica.';
            }

            // Lo transformamos a un proxy que pueda ser utilizado como referencia
            $oEstado = $em->getReference('AppBundle:ComprasOrdenesEstados', $estado);

            $comprador = $em->getRepository('AppBundle:Empleados')->find($request->get('cmbComprador'));

            $dOrden->setComprador($comprador);
            $dOrden->setEstado($oEstado);
            $em->persist($dOrden);
            $em->flush();

            // Agregamos el comentario
            $dOrdenComentario = new ComprasOrdenesComentarios();
            $dOrdenComentario->setComentario("Acción de revisión de compra");
            $dOrdenComentario->setOrden($dOrden);
            $dOrdenComentario->setEstado($oEstado);
            $dOrdenComentario->setActivo(true);
            $dOrdenComentario->setCreadoPor($this->getUser());
            $em->persist($dOrdenComentario);
            $em->flush();

            $compras->sendNotification($orden, 'vladimiroski@gmail.com', $asunto, $titulo, $mensaje);
        }

        $compras = $this->get('compras');
        /* @var $compras \AppBundle\Controller\compras\ServicioComprasController */

        $data['orden'] = $aDetalleCompra = $compras->getDetalleOrdenCompra($orden);
        $data['compradores'] = $em->createQuery("SELECT e FROM AppBundle:Empleados e JOIN e.roles r WHERE r IN (:ROLES)")
                ->setParameter('ROLES', array(7)) // 'ROLE_COMPRADOR'
                ->getResult();

        return $this->render('AppBundle:ComprasOrdenes:ver.html.twig', ['data' => $data]);
    }

}
