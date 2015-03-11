<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprasOrdenesProductos
 */
class ComprasOrdenesProductos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cantidad;

    /**
     * @var \AppBundle\Entity\ComprasProductosUnidades
     */
    private $unidad;

    /**
     * @var \AppBundle\Entity\ComprasProductos
     */
    private $producto;


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
     * Set cantidad
     *
     * @param string $cantidad
     * @return ComprasOrdenesProductos
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return string 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set unidad
     *
     * @param \AppBundle\Entity\ComprasProductosUnidades $unidad
     * @return ComprasOrdenesProductos
     */
    public function setUnidad(\AppBundle\Entity\ComprasProductosUnidades $unidad = null)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get unidad
     *
     * @return \AppBundle\Entity\ComprasProductosUnidades 
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Set producto
     *
     * @param \AppBundle\Entity\ComprasProductos $producto
     * @return ComprasOrdenesProductos
     */
    public function setProducto(\AppBundle\Entity\ComprasProductos $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \AppBundle\Entity\ComprasProductos 
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
