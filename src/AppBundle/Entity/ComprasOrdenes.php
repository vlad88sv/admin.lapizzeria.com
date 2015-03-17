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
    /**
     * @var \AppBundle\Entity\Sucursales
     */
    private $sucursal;


    /**
     * Set sucursal
     *
     * @param \AppBundle\Entity\Sucursales $sucursal
     * @return ComprasOrdenes
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
