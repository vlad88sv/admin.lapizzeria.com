<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprasOrdenesComentarios
 */
class ComprasOrdenesComentarios
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $comentario;

    /**
     * @var \DateTime
     */
    private $creadoDt;

    /**
     * @var boolean
     */
    private $activo;

    /**
     * @var \AppBundle\Entity\ComprasOrdenesEstados
     */
    private $estado;


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
     * Set comentario
     *
     * @param string $comentario
     * @return ComprasOrdenesComentarios
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set creadoDt
     *
     * @param \DateTime $creadoDt
     * @return ComprasOrdenesComentarios
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
     * Set activo
     *
     * @param boolean $activo
     * @return ComprasOrdenesComentarios
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
     * Set estado
     *
     * @param \AppBundle\Entity\ComprasOrdenesEstados $estado
     * @return ComprasOrdenesComentarios
     */
    public function setEstado(\AppBundle\Entity\ComprasOrdenesEstados $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \AppBundle\Entity\ComprasOrdenesEstados 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
        $this->creadoDt = new \DateTime();
    }
    
    /**
     * @var \AppBundle\Entity\ComprasOrdenes
     */
    private $orden;


    /**
     * Set orden
     *
     * @param \AppBundle\Entity\ComprasOrdenes $orden
     * @return ComprasOrdenesComentarios
     */
    public function setOrden(\AppBundle\Entity\ComprasOrdenes $orden = null)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return \AppBundle\Entity\ComprasOrdenes 
     */
    public function getOrden()
    {
        return $this->orden;
    }
    /**
     * @var \AppBundle\Entity\Empleados
     */
    private $creadoPor;


    /**
     * Set creadoPor
     *
     * @param \AppBundle\Entity\Empleados $creadoPor
     * @return ComprasOrdenesComentarios
     */
    public function setCreadoPor(\AppBundle\Entity\Empleados $creadoPor = null)
    {
        $this->creadoPor = $creadoPor;

        return $this;
    }

    /**
     * Get creadoPor
     *
     * @return \AppBundle\Entity\Empleados 
     */
    public function getCreadoPor()
    {
        return $this->creadoPor;
    }
}
