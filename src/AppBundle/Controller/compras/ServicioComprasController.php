<?php

namespace AppBundle\Controller\compras;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * ComprasProveedores controller.
 *
 */
class servicioComprasController extends Controller {
    /* @var $em \Doctrine\ORM\EntityManager */

    protected $em;

    /* @var $mailer \Swift_Mailer */
    protected $mailer;
    
    protected $templating;

    public function __construct(\Doctrine\ORM\EntityManager $em, \Swift_Mailer $mailer, $templating) {
        $this->em = $em;
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function getDetalleOrdenCompra($id) {
        $detalle = [];

        $detalle['orden'] = $this->em->getRepository('AppBundle:ComprasOrdenes')->find($id);

        $sDql = 'SELECT cop FROM AppBundle:ComprasOrdenesProductos cop JOIN AppBundle:ComprasProductos cprod WITH cop.producto = cprod JOIN AppBundle:ComprasProveedores cp WITH cprod.proveedor = cp WHERE cop.orden = :orden ORDER BY cp.id ASC';
        $detalle['productos'] = $this->em->createQuery($sDql)
                ->setParameter('orden', $id)
                ->getResult();

        return $detalle;
    }

    public function sendNotification($iOrden, $para, $asunto = 'Detalles de compra', $titulo = 'Detalles de compra', $mensaje = '') {

        $orden = $this->getDetalleOrdenCompra($iOrden);
        
        $asunto .= " | No. $iOrden";

        $message = $this->mailer->createMessage()
                ->setFrom('info@lapizzeria.com')
                ->setSubject($asunto)
                ->setTo(array('vladimiroski@gmail.com' => 'Vladimir Hidalgo'))
                ->setBody(
                $this->templating->render(
                        'AppBundle:Correos:enviarOrden.html.twig', array('orden' => $orden, 'titulo' => $titulo, 'mensaje' => $mensaje)
                ), 'text/html'
        );
        $this->mailer->send($message);
    }

}
