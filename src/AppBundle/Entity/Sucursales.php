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
    private $nombre = '';

    /**
     * @var boolean
     */
    private $telefono = '';

    /**
     * @var boolean
     */
    private $direccion = '';

    /**
     * @var boolean
     */
    private $activo = true;


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
     * @param boolean $telefono
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
     * @return boolean 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set direccion
     *
     * @param boolean $direccion
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
     * @return boolean 
     */
    public function getDireccion()
    {
        return $this->direccion;
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
}
