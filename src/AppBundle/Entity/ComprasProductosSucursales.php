<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprasProductosSucursales
 */
class ComprasProductosSucursales
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\ComprasProductos
     */
    private $producto;

    /**
     * @var \AppBundle\Entity\Sucursales
     */
    private $sucursal;


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
     * Set producto
     *
     * @param \AppBundle\Entity\ComprasProductos $producto
     * @return ComprasProductosSucursales
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

    /**
     * Set sucursal
     *
     * @param \AppBundle\Entity\Sucursales $sucursal
     * @return ComprasProductosSucursales
     */
    public function setSucursal(\AppBundle\Entity\Sucursales $sucursal = null)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return \AppBundle\Entity\Sucursales 
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }
}
