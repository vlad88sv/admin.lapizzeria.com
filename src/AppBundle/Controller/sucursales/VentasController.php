<?php

namespace AppBundle\Controller\sucursales;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VentasController extends Controller {

    public function indexAction() {
        $data = [];

        $fields = array(
            'TPL' => 'estadisticas',
            'periodo_inicio' => date('Y-m-d 00:00:00'),
            'periodo_final' => date('Y-m-d 23:59:59')
        );

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'timeout' => 10,
                'content' => http_build_query($fields),
            )
        );

        $context = stream_context_create($options);

        try {
            $data['mascota'] = json_decode(file_get_contents('http://mascota.zapto.org/SERV/?REFERENCIA=estadisticas', false, $context), true);
        } catch (\Exception $e) {
            
        }

        try {
            $data['volcan'] = json_decode(file_get_contents('http://volcan.zapto.org/SERV/?REFERENCIA=estadisticas', false, $context));
        } catch (\Exception $e) {
            
        }

        try {
            $data['castanos'] = json_decode(file_get_contents('http://castanos.zapto.org/SERV/?REFERENCIA=estadisticas', false, $context));
        } catch (\Exception $e) {
            
        }

        try {
            $data['skina'] = json_decode(file_get_contents('http://skina.zapto.org/SERV/?REFERENCIA=estadisticas', false, $context));
        } catch (\Exception $e) {
            
        }

        return $this->render('AppBundle:Sucursales:ventas.html.twig', ['data' => $data]);
    }

    public function totalesAction() {
        
    }

}
