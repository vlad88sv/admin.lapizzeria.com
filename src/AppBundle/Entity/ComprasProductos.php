<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprasProductos
 */
class ComprasProductos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var boolean
     */
    private $activo;

    /**
     * @var \DateTime
     */
    private $creadoDt;

    /**
     * @var \DateTime
     */
    private $actualizadoDt;

    /**
     * @var \AppBundle\Entity\ComprasProveedores
     */
    private $proveedor;

    /**
     * @var \AppBundle\Entity\ComprasProductosUnidades
     */
    private $unidad;


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
     * Set nombre
     *
     * @param string $nombre
     * @return ComprasProductos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ComprasProductos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return ComprasProductos
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set creadoDt
     *
     * @param \DateTime $creadoDt
     * @return ComprasProductos
     */
    public function setCreadoDt($creadoDt)
    {
        $this->creadoDt = $creadoDt;

        return $this;
    }

    /**
     * Get creadoDt
     *
     * @return \DateTime 
     */
    public function getCreadoDt()
    {
        return $this->creadoDt;
    }

    /**
     * Set actualizadoDt
     *
     * @param \DateTime $actualizadoDt
     * @return ComprasProductos
     */
    public function setActualizadoDt($actualizadoDt)
    {
        $this->actualizadoDt = $actualizadoDt;

        return $this;
    }

    /**
     * Get actualizadoDt
     *
     * @return \DateTime 
     */
    public function getActualizadoDt()
    {
        return $this->actualizadoDt;
    }

    /**
     * Set proveedor
     *
     * @param \AppBundle\Entity\ComprasProveedores $proveedor
     * @return ComprasProductos
     */
    public function setProveedor(\AppBundle\Entity\ComprasProveedores $proveedor = null)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return \AppBundle\Entity\ComprasProveedores 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set unidad
     *
     * @param \AppBundle\Entity\ComprasProductosUnidades $unidad
     * @return ComprasProductos
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
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
        $this->creadoDt = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     */
    public function setUpdatedValue()
    {
        $this->actualizadoDt = new \DateTime();
    }
    /**
     * @var boolean
     */
    private $foto;


    /**
     * Set foto
     *
     * @param boolean $foto
     * @return ComprasProductos
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return boolean 
     */
    public function getFoto()
    {
        return $this->foto;
    }
}
