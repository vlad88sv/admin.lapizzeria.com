<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprasOrdenes
 */
class ComprasOrdenes
{
    /**
     * @var integer
     */
    private $id;


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
     * @var \AppBundle\Entity\Sucursales
     */
    private $orden;


    /**
     * Set orden
     *
     * @param \AppBundle\Entity\Sucursales $orden
     * @return ComprasOrdenes
     */
    public function setOrden(\AppBundle\Entity\Sucursales $orden = null)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return \AppBundle\Entity\Sucursales 
     */
    public function getOrden()
    {
        return $this->orden;
    }
    /**
     * @var \DateTime
     */
    private $ingresadoDt;


    /**
     * Set ingresadoDt
     *
     * @param \DateTime $ingresadoDt
     * @return ComprasOrdenes
     */
    public function setIngresadoDt($ingresadoDt)
    {
        $this->ingresadoDt = $ingresadoDt;

        return $this;
    }

    /**
     * Get ingresadoDt
     *
     * @return \DateTime 
     */
    public function getIngresadoDt()
    {
        return $this->ingresadoDt;
    }
}
