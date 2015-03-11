<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmpleadosRoles
 */
class EmpleadosRoles
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
     * @var \AppBundle\Entity\Roles
     */
    private $rol;

    /**
     * @var \AppBundle\Entity\Empleados
     */
    private $usuario;


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
     * @return EmpleadosRoles
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
     * Set rol
     *
     * @param \AppBundle\Entity\Roles $rol
     * @return EmpleadosRoles
     */
    public function setRol(\AppBundle\Entity\Roles $rol = null)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return \AppBundle\Entity\Roles 
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\Empleados $usuario
     * @return EmpleadosRoles
     */
    public function setUsuario(\AppBundle\Entity\Empleados $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\Empleados 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
