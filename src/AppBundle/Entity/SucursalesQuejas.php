<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SucursalesQuejas
 */
class SucursalesQuejas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $queja;

    /**
     * @var string
     */
    private $solucion;

    /**
     * @var integer
     */
    private $nota;

    /**
     * @var boolean
     */
    private $clienteReportoPrimero;

    /**
     * @var \AppBundle\Entity\Sucursales
     */
    private $sucursal;

    /**
     * @var \AppBundle\Entity\Empleados
     */
    private $gerente;

    /**
     * @var \AppBundle\Entity\Empleados
     */
    private $ingresadoPor;


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
     * Set queja
     *
     * @param string $queja
     * @return SucursalesQuejas
     */
    public function setQueja($queja)
    {
        $this->queja = $queja;

        return $this;
    }

    /**
     * Get queja
     *
     * @return string 
     */
    public function getQueja()
    {
        return $this->queja;
    }

    /**
     * Set solucion
     *
     * @param string $solucion
     * @return SucursalesQuejas
     */
    public function setSolucion($solucion)
    {
        $this->solucion = $solucion;

        return $this;
    }

    /**
     * Get solucion
     *
     * @return string 
     */
    public function getSolucion()
    {
        return $this->solucion;
    }

    /**
     * Set nota
     *
     * @param integer $nota
     * @return SucursalesQuejas
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return integer 
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set clienteReportoPrimero
     *
     * @param boolean $clienteReportoPrimero
     * @return SucursalesQuejas
     */
    public function setClienteReportoPrimero($clienteReportoPrimero)
    {
        $this->clienteReportoPrimero = $clienteReportoPrimero;

        return $this;
    }

    /**
     * Get clienteReportoPrimero
     *
     * @return boolean 
     */
    public function getClienteReportoPrimero()
    {
        return $this->clienteReportoPrimero;
    }

    /**
     * Set sucursal
     *
     * @param \AppBundle\Entity\Sucursales $sucursal
     * @return SucursalesQuejas
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

    /**
     * Set gerente
     *
     * @param \AppBundle\Entity\Empleados $gerente
     * @return SucursalesQuejas
     */
    public function setGerente(\AppBundle\Entity\Empleados $gerente = null)
    {
        $this->gerente = $gerente;

        return $this;
    }

    /**
     * Get gerente
     *
     * @return \AppBundle\Entity\Empleados 
     */
    public function getGerente()
    {
        return $this->gerente;
    }

    /**
     * Set ingresadoPor
     *
     * @param \AppBundle\Entity\Empleados $ingresadoPor
     * @return SucursalesQuejas
     */
    public function setIngresadoPor(\AppBundle\Entity\Empleados $ingresadoPor = null)
    {
        $this->ingresadoPor = $ingresadoPor;

        return $this;
    }

    /**
     * Get ingresadoPor
     *
     * @return \AppBundle\Entity\Empleados 
     */
    public function getIngresadoPor()
    {
        return $this->ingresadoPor;
    }
    /**
     * @var \DateTime
     */
    private $horaRegistro;


    /**
     * Set horaRegistro
     *
     * @param \DateTime $horaRegistro
     * @return SucursalesQuejas
     */
    public function setHoraRegistro($horaRegistro)
    {
        $this->horaRegistro = $horaRegistro;

        return $this;
    }

    /**
     * Get horaRegistro
     *
     * @return \DateTime 
     */
    public function getHoraRegistro()
    {
        return $this->horaRegistro;
    }
}
