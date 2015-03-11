<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprasPagos
 */
class ComprasPagos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $monto;

    /**
     * @var string
     */
    private $numeroFiscal;

    /**
     * @var \DateTime
     */
    private $creadoPorDt;

    /**
     * @var \DateTime
     */
    private $validadoPorDt;

    /**
     * @var string
     */
    private $comentario;

    /**
     * @var integer
     */
    private $numeroFiscalInterno;

    /**
     * @var string
     */
    private $numeroComprobante;

    /**
     * @var \AppBundle\Entity\Empleados
     */
    private $creadoPor;

    /**
     * @var \AppBundle\Entity\ComprasPagosFormas
     */
    private $formaPago;

    /**
     * @var \AppBundle\Entity\ComprasPagosFormas
     */
    private $formaPagoInterna;

    /**
     * @var \AppBundle\Entity\ComprasPagosTipoFiscal
     */
    private $tipoFiscalInterno;

    /**
     * @var \AppBundle\Entity\ComprasPagosTipoFiscal
     */
    private $tipoFiscal;

    /**
     * @var \AppBundle\Entity\Empleados
     */
    private $validadoPor;


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
     * Set monto
     *
     * @param string $monto
     * @return ComprasPagos
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set numeroFiscal
     *
     * @param string $numeroFiscal
     * @return ComprasPagos
     */
    public function setNumeroFiscal($numeroFiscal)
    {
        $this->numeroFiscal = $numeroFiscal;

        return $this;
    }

    /**
     * Get numeroFiscal
     *
     * @return string 
     */
    public function getNumeroFiscal()
    {
        return $this->numeroFiscal;
    }

    /**
     * Set creadoPorDt
     *
     * @param \DateTime $creadoPorDt
     * @return ComprasPagos
     */
    public function setCreadoPorDt($creadoPorDt)
    {
        $this->creadoPorDt = $creadoPorDt;

        return $this;
    }

    /**
     * Get creadoPorDt
     *
     * @return \DateTime 
     */
    public function getCreadoPorDt()
    {
        return $this->creadoPorDt;
    }

    /**
     * Set validadoPorDt
     *
     * @param \DateTime $validadoPorDt
     * @return ComprasPagos
     */
    public function setValidadoPorDt($validadoPorDt)
    {
        $this->validadoPorDt = $validadoPorDt;

        return $this;
    }

    /**
     * Get validadoPorDt
     *
     * @return \DateTime 
     */
    public function getValidadoPorDt()
    {
        return $this->validadoPorDt;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return ComprasPagos
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
     * Set numeroFiscalInterno
     *
     * @param integer $numeroFiscalInterno
     * @return ComprasPagos
     */
    public function setNumeroFiscalInterno($numeroFiscalInterno)
    {
        $this->numeroFiscalInterno = $numeroFiscalInterno;

        return $this;
    }

    /**
     * Get numeroFiscalInterno
     *
     * @return integer 
     */
    public function getNumeroFiscalInterno()
    {
        return $this->numeroFiscalInterno;
    }

    /**
     * Set numeroComprobante
     *
     * @param string $numeroComprobante
     * @return ComprasPagos
     */
    public function setNumeroComprobante($numeroComprobante)
    {
        $this->numeroComprobante = $numeroComprobante;

        return $this;
    }

    /**
     * Get numeroComprobante
     *
     * @return string 
     */
    public function getNumeroComprobante()
    {
        return $this->numeroComprobante;
    }

    /**
     * Set creadoPor
     *
     * @param \AppBundle\Entity\Empleados $creadoPor
     * @return ComprasPagos
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

    /**
     * Set formaPago
     *
     * @param \AppBundle\Entity\ComprasPagosFormas $formaPago
     * @return ComprasPagos
     */
    public function setFormaPago(\AppBundle\Entity\ComprasPagosFormas $formaPago = null)
    {
        $this->formaPago = $formaPago;

        return $this;
    }

    /**
     * Get formaPago
     *
     * @return \AppBundle\Entity\ComprasPagosFormas 
     */
    public function getFormaPago()
    {
        return $this->formaPago;
    }

    /**
     * Set formaPagoInterna
     *
     * @param \AppBundle\Entity\ComprasPagosFormas $formaPagoInterna
     * @return ComprasPagos
     */
    public function setFormaPagoInterna(\AppBundle\Entity\ComprasPagosFormas $formaPagoInterna = null)
    {
        $this->formaPagoInterna = $formaPagoInterna;

        return $this;
    }

    /**
     * Get formaPagoInterna
     *
     * @return \AppBundle\Entity\ComprasPagosFormas 
     */
    public function getFormaPagoInterna()
    {
        return $this->formaPagoInterna;
    }

    /**
     * Set tipoFiscalInterno
     *
     * @param \AppBundle\Entity\ComprasPagosTipoFiscal $tipoFiscalInterno
     * @return ComprasPagos
     */
    public function setTipoFiscalInterno(\AppBundle\Entity\ComprasPagosTipoFiscal $tipoFiscalInterno = null)
    {
        $this->tipoFiscalInterno = $tipoFiscalInterno;

        return $this;
    }

    /**
     * Get tipoFiscalInterno
     *
     * @return \AppBundle\Entity\ComprasPagosTipoFiscal 
     */
    public function getTipoFiscalInterno()
    {
        return $this->tipoFiscalInterno;
    }

    /**
     * Set tipoFiscal
     *
     * @param \AppBundle\Entity\ComprasPagosTipoFiscal $tipoFiscal
     * @return ComprasPagos
     */
    public function setTipoFiscal(\AppBundle\Entity\ComprasPagosTipoFiscal $tipoFiscal = null)
    {
        $this->tipoFiscal = $tipoFiscal;

        return $this;
    }

    /**
     * Get tipoFiscal
     *
     * @return \AppBundle\Entity\ComprasPagosTipoFiscal 
     */
    public function getTipoFiscal()
    {
        return $this->tipoFiscal;
    }

    /**
     * Set validadoPor
     *
     * @param \AppBundle\Entity\Empleados $validadoPor
     * @return ComprasPagos
     */
    public function setValidadoPor(\AppBundle\Entity\Empleados $validadoPor = null)
    {
        $this->validadoPor = $validadoPor;

        return $this;
    }

    /**
     * Get validadoPor
     *
     * @return \AppBundle\Entity\Empleados 
     */
    public function getValidadoPor()
    {
        return $this->validadoPor;
    }
}
