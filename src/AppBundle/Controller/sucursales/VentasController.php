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
        JOIN empleados_sucursales es ON s.id = es.sucursales_id AND es.empleados_id = :empleados_id
        JOIN ( SELECT MAX(st1.id) AS id, st1.sucursal_id, st1.fecha FROM cortez st1 WHERE st1.fecha <= :fecha GROUP BY st1.sucursal_id)  AS c2
        ON es.sucursales_id = c2.sucursal_id
        JOIN cortez c ON c.id = c2.id 
        ORDER BY s.id ASC
        ";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->bindValue('fecha', (string)$fecha);
        $stmt->bindValue('empleados_id', (int)$this->getUser()->getId());
        $stmt->execute();
        $cortez = $stmt->fetchAll();

        return $this->render('AppBundle:Sucursales:contenedorVentas.html.twig', ['cortez' => $cortez]);
    }

}
