<?php

namespace AppBundle\Controller\sucursales;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VentasController extends Controller {

    public function indexAction() {
        $data = [];

        return $this->render('AppBundle:Sucursales:ventas.html.twig', ['data' => $data]);
    }

    public function totalesAction($fecha) {
        
        $fecha = urldecode($fecha);
        
        $fecha = $fecha ?: date('Y-m-d H:i:59');
        
        $em = $this->getDoctrine()->getManager();

        $sql = " 
            SELECT s.nombre, c.id, c.fecha, c.total, c.total_pendiente, c.total_posible, c.total_anulado, c.total_cancelado, c.total_descuentos, c.total_compras, c.total_cuadrar, c.total_compras_cuadrar, c.sucursal_id
            FROM sucursales s
            LEFT JOIN cortez c ON s.id = c.sucursal_id
            WHERE c.id = (
            SELECT c2.id
            FROM cortez c2
            WHERE c2.sucursal_id = c.sucursal_id AND
            c2.fecha <= :fecha
            ORDER BY c2.id DESC
            LIMIT 1)
        ";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->bindValue('fecha', (string)$fecha);
        $stmt->execute();
        $cortez = $stmt->fetchAll();

        return $this->render('AppBundle:Sucursales:contenedorVentas.html.twig', ['cortez' => $cortez]);
    }

}
