<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\Sucursales;

class SyncCortezCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cron:SyncCortez')
            ->setDescription('Sincroniza los cortes de todas las sucursales')
           
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $em = $this->getContainer()->get('doctrine')->getManager();
        /* @var $em \Doctrine\ORM\EntityManager */  
        
        $doSucursales = $em->getRepository(Sucursales::class)->findAll();
        
        $data = [];

        $fields = array(
            'TPL' => 'cortez',
            'fecha' => date('Y-m-d'),  
        );

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'timeout' => 30,
                'content' => http_build_query($fields),
            )
        );

        $context = stream_context_create($options);

        $fecha = new \DateTime;
        
        /* @var $sucursal \AppBundle\Entity\Sucursales */
        foreach($doSucursales as $sucursal) {
        
            try {
                $json = json_decode(file_get_contents($sucursal->getWsServUrl(), false, $context), true);
            } catch (\Exception $e) {
                // No se pudo hacer fetch de la sucursal
                $output->writeln("Sucursal FALLIDA: " . $sucursal->getNombre());
                continue;
            }
            
            if (!is_array($json)) {
                continue;
            }
            
            $doCortez = new \AppBundle\Entity\Cortez();
            $doCortez->setFecha($fecha);
            $doCortez->setTotal($json['aux']['total']);
            $doCortez->setTotalAnulado($json['aux']['total_anulado']);
            $doCortez->setTotalCancelado($json['aux']['total_cancelado']);
            $doCortez->setTotalCompras($json['aux']['total_compras']);
            $doCortez->setTotalComprasCuadrar($json['aux']['total_compras_cuadrar']);
            $doCortez->setTotalCuadrar($json['aux']['total_cuadrar']);
            $doCortez->setTotalDescuentos($json['aux']['total_descuentos']);
            $doCortez->setTotalPendiente($json['aux']['total_pendiente']);
            $doCortez->setTotalPosible($json['aux']['total_posible']);
            $doCortez->setSucursal($sucursal);
            
            $em->persist($doCortez);
            $em->flush();
            $em->clear();
            
            $output->writeln("Sucursal persistida: " . $sucursal->getNombre());
        }
    }
}