<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sucursales
 */
class Sucursales
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
    private $telefono;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $wsServUrl;

    /**
     * @var boolean
     */
    private $activo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $empleados;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->empleados = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Sucursales
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
     * Set telefono
     *
     * @param string $telefono
     * @return Sucursales
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Sucursales
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set wsServUrl
     *
     * @param string $wsServUrl
     * @return Sucursales
     */
    public function setWsServUrl($wsServUrl)
    {
        $this->wsServUrl = $wsServUrl;

        return $this;
    }

    /**
     * Get wsServUrl
     *
     * @return string 
     */
    public function getWsServUrl()
    {
        return $this->wsServUrl;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Sucursales
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
     * Add empleados
     *
     * @param \AppBundle\Entity\Empleados $empleados
     * @return Sucursales
     */
    public function addEmpleado(\AppBundle\Entity\Empleados $empleados)
    {
        $this->empleados[] = $empleados;

        return $this;
    }

    /**
     * Remove empleados
     *
     * @param \AppBundle\Entity\Empleados $empleados
     */
    public function removeEmpleado(\AppBundle\Entity\Empleados $empleados)
    {
        $this->empleados->removeElement($empleados);
    }

    /**
     * Get empleados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmpleados()
    {
        return $this->empleados;
    }
}
