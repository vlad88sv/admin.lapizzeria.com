<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cortez
 */
class Cortez
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $total;

    /**
     * @var string
     */
    private $totalPendiente;

    /**
     * @var string
     */
    private $totalPosible;

    /**
     * @var string
     */
    private $totalAnulado;

    /**
     * @var \DateTime
     */
    private $totalCancelado;

    /**
     * @var string
     */
    private $totalDescuentos;

    /**
     * @var string
     */
    private $totalCompras;

    /**
     * @var string
     */
    private $totalCuadrar;

    /**
     * @var string
     */
    private $totalComprasCuadrar;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return cortez
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set total
     *
     * @param string $total
     * @return cortez
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set totalPendiente
     *
     * @param string $totalPendiente
     * @return cortez
     */
    public function setTotalPendiente($totalPendiente)
    {
        $this->totalPendiente = $totalPendiente;

        return $this;
    }

    /**
     * Get totalPendiente
     *
     * @return string 
     */
    public function getTotalPendiente()
    {
        return $this->totalPendiente;
    }

    /**
     * Set totalPosible
     *
     * @param string $totalPosible
     * @return cortez
     */
    public function setTotalPosible($totalPosible)
    {
        $this->totalPosible = $totalPosible;

        return $this;
    }

    /**
     * Get totalPosible
     *
     * @return string 
     */
    public function getTotalPosible()
    {
        return $this->totalPosible;
    }

    /**
     * Set totalAnulado
     *
     * @param string $totalAnulado
     * @return cortez
     */
    public function setTotalAnulado($totalAnulado)
    {
        $this->totalAnulado = $totalAnulado;

        return $this;
    }

    /**
     * Get totalAnulado
     *
     * @return string 
     */
    public function getTotalAnulado()
    {
        return $this->totalAnulado;
    }

    /**
     * Set totalCancelado
     *
     * @param \DateTime $totalCancelado
     * @return cortez
     */
    public function setTotalCancelado($totalCancelado)
    {
        $this->totalCancelado = $totalCancelado;

        return $this;
    }

    /**
     * Get totalCancelado
     *
     * @return \DateTime 
     */
    public function getTotalCancelado()
    {
        return $this->totalCancelado;
    }

    /**
     * Set totalDescuentos
     *
     * @param string $totalDescuentos
     * @return cortez
     */
    public function setTotalDescuentos($totalDescuentos)
    {
        $this->totalDescuentos = $totalDescuentos;

        return $this;
    }

    /**
     * Get totalDescuentos
     *
     * @return string 
     */
    public function getTotalDescuentos()
    {
        return $this->totalDescuentos;
    }

    /**
     * Set totalCompras
     *
     * @param string $totalCompras
     * @return cortez
     */
    public function setTotalCompras($totalCompras)
    {
        $this->totalCompras = $totalCompras;

        return $this;
    }

    /**
     * Get totalCompras
     *
     * @return string 
     */
    public function getTotalCompras()
    {
        return $this->totalCompras;
    }

    /**
     * Set totalCuadrar
     *
     * @param string $totalCuadrar
     * @return cortez
     */
    public function setTotalCuadrar($totalCuadrar)
    {
        $this->totalCuadrar = $totalCuadrar;

        return $this;
    }

    /**
     * Get totalCuadrar
     *
     * @return string 
     */
    public function getTotalCuadrar()
    {
        return $this->totalCuadrar;
    }

    /**
     * Set totalComprasCuadrar
     *
     * @param string $totalComprasCuadrar
     * @return cortez
     */
    public function setTotalComprasCuadrar($totalComprasCuadrar)
    {
        $this->totalComprasCuadrar = $totalComprasCuadrar;

        return $this;
    }

    /**
     * Get totalComprasCuadrar
     *
     * @return string 
     */
    public function getTotalComprasCuadrar()
    {
        return $this->totalComprasCuadrar;
    }
}
