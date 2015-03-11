<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprasOrdenesEstados
 */
class ComprasOrdenesEstados
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var boolean
     */
    private $relevante;

    /**
     * @var boolean
     */
    private $activo;

    /**
     * @var integer
     */
    private $creadoPor;

    /**
     * @var \DateTime
     */
    private $creadoDt;


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
     * Set estado
     *
     * @param string $estado
     * @return ComprasOrdenesEstados
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set relevante
     *
     * @param boolean $relevante
     * @return ComprasOrdenesEstados
     */
    public function setRelevante($relevante)
    {
        $this->relevante = $relevante;

        return $this;
    }

    /**
     * Get relevante
     *
     * @return boolean 
     */
    public function getRelevante()
    {
        return $this->relevante;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return ComprasOrdenesEstados
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
     * Set creadoPor
     *
     * @param integer $creadoPor
     * @return ComprasOrdenesEstados
     */
    public function setCreadoPor($creadoPor)
    {
        $this->creadoPor = $creadoPor;

        return $this;
    }

    /**
     * Get creadoPor
     *
     * @return integer 
     */
    public function getCreadoPor()
    {
        return $this->creadoPor;
    }

    /**
     * Set creadoDt
     *
     * @param \DateTime $creadoDt
     * @return ComprasOrdenesEstados
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
}
