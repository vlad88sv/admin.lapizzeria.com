<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmpleadosSucursales
 */
class EmpleadosSucursales
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $activo;

    /**
     * @var \AppBundle\Entity\Empleados
     */
    private $empleado;

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
     * Set activo
     *
     * @param boolean $activo
     * @return EmpleadosSucursales
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
     * Set empleado
     *
     * @param \AppBundle\Entity\Empleados $empleado
     * @return EmpleadosSucursales
     */
    public function setEmpleado(\AppBundle\Entity\Empleados $empleado = null)
    {
        $this->empleado = $empleado;

        return $this;
    }

    /**
     * Get empleado
     *
     * @return \AppBundle\Entity\Empleados 
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }

    /**
     * Set sucursal
     *
     * @param \AppBundle\Entity\Sucursales $sucursal
     * @return EmpleadosSucursales
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
