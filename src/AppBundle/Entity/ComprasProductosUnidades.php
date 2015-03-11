<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprasProductosUnidades
 */
class ComprasProductosUnidades
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $abreviatura;

    /**
     * @var string
     */
    private $nombreSingular;

    /**
     * @var string
     */
    private $nombrePlural;

    /**
     * @var boolean
     */
    private $activo;


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
     * Set abreviatura
     *
     * @param string $abreviatura
     * @return ComprasProductosUnidades
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;

        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string 
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * Set nombreSingular
     *
     * @param string $nombreSingular
     * @return ComprasProductosUnidades
     */
    public function setNombreSingular($nombreSingular)
    {
        $this->nombreSingular = $nombreSingular;

        return $this;
    }

    /**
     * Get nombreSingular
     *
     * @return string 
     */
    public function getNombreSingular()
    {
        return $this->nombreSingular;
    }

    /**
     * Set nombrePlural
     *
     * @param string $nombrePlural
     * @return ComprasProductosUnidades
     */
    public function setNombrePlural($nombrePlural)
    {
        $this->nombrePlural = $nombrePlural;

        return $this;
    }

    /**
     * Get nombrePlural
     *
     * @return string 
     */
    public function getNombrePlural()
    {
        return $this->nombrePlural;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return ComprasProductosUnidades
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
    
    public function __toString() {
        return $this->nombreSingular;
    }
}
