<?php

namespace App\Entity;
use Ramsey\Uuid\Uuid;
/**
 * Orden
 */
class Orden
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var float
     */
    private $precioNeto;

    /**
     * @var float|null
     */
    private $descuento;

    /**
     * @var string|null
     */
    private $pago;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $conceptos;

    /**
     * @var \App\Entity\Cliente
     */
    private $cliente;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4()->toString();
        $this->conceptos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id.
     *
     * @param string $id
     *
     * @return Orden
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha.
     *
     * @param \DateTime $fecha
     *
     * @return Orden
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha.
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set precioNeto.
     *
     * @param float $precioNeto
     *
     * @return Orden
     */
    public function setPrecioNeto($precioNeto)
    {
        $this->precioNeto = $precioNeto;

        return $this;
    }

    /**
     * Get precioNeto.
     *
     * @return float
     */
    public function getPrecioNeto()
    {
        return $this->precioNeto;
    }

    /**
     * Set descuento.
     *
     * @param float|null $descuento
     *
     * @return Orden
     */
    public function setDescuento($descuento = null)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get descuento.
     *
     * @return float|null
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set pago.
     *
     * @param string|null $pago
     *
     * @return Orden
     */
    public function setPago($pago = null)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get pago.
     *
     * @return string|null
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Add concepto.
     *
     * @param \App\Entity\MaterialesPorServicio $concepto
     *
     * @return Orden
     */
    public function addConcepto(\App\Entity\MaterialesPorServicio $concepto)
    {
        $this->conceptos[] = $concepto;

        return $this;
    }

    /**
     * Remove concepto.
     *
     * @param \App\Entity\MaterialesPorServicio $concepto
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeConcepto(\App\Entity\MaterialesPorServicio $concepto)
    {
        return $this->conceptos->removeElement($concepto);
    }

    /**
     * Get conceptos.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConceptos()
    {
        return $this->conceptos;
    }

    /**
     * Set cliente.
     *
     * @param \App\Entity\Cliente|null $cliente
     *
     * @return Orden
     */
    public function setCliente(\App\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente.
     *
     * @return \App\Entity\Cliente|null
     */
    public function getCliente()
    {
        return $this->cliente;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $servicios;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $recursos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $envios;


    /**
     * Add servicio.
     *
     * @param \App\Entity\ServiciosPorOrden $servicio
     *
     * @return Orden
     */
    public function addServicio(\App\Entity\ServiciosPorOrden $servicio)
    {
        $this->servicios[] = $servicio;

        return $this;
    }

    /**
     * Add servicio to orden.
     *
     * @param \App\Entity\Servicio $servicio
     *
     * @return Orden
     */
    public function addServicioToOrden(\App\Entity\Servicio $servicio, $cantidad)
    {
        $servicioToOrden = new ServicioPorOrden();
        $servicioToOrden -> setOrden($this);
        $servicioToOrden -> setServicio($servicio);
        $servicioToOrden -> setCantidad($cantidad);
        $servicioToOrden -> setSubtotal($cantidad * $servicio->getPrecio());
        $this->servicios[] = $servicioToOrden;

        return $this;
    }
    /**
     * Remove servicio.
     *
     * @param \App\Entity\ServiciosPorOrden $servicio
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeServicio(\App\Entity\ServiciosPorOrden $servicio)
    {
        return $this->servicios->removeElement($servicio);
    }

    /**
     * Get servicios.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServicios()
    {
        return $this->servicios;
    }

    /**
     * Add recurso.
     *
     * @param \App\Entity\RecursosPorOrden $recurso
     *
     * @return Orden
     */
    public function addRecurso(\App\Entity\RecursosPorOrden $recurso)
    {
        
        $this->recursos[] = $recurso;

        return $this;
    }

    /**
     * Add recurso to orden.
     *
     * @param \App\Entity\Recurso $recurso
     *
     * @return Orden
     */
    public function addRecursoToOrden(\App\Entity\Recurso $recurso, $cantidad)
    {
        $recursoToOrden = new RecursoPorOrden();
        $recursoToOrden -> setOrden($this);
        $recursoToOrden -> setRecurso($recurso);
        $recursoToOrden -> setCantidad($cantidad);
        $recursoToOrden -> setSubtotal($cantidad * $recurso->getPrecio());
        $this->recursos[] = $recursoToOrden;

        return $this;
    }
    /**
     * Remove recurso.
     *
     * @param \App\Entity\RecursosPorOrden $recurso
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRecurso(\App\Entity\RecursosPorOrden $recurso)
    {
        return $this->recursos->removeElement($recurso);
    }

    /**
     * Get recursos.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecursos()
    {
        return $this->recursos;
    }

    /**
     * Add envio.
     *
     * @param \App\Entity\EnviosPorOrden $envio
     *
     * @return Orden
     */
    public function addEnvio(\App\Entity\EnviosPorOrden $envio)
    {
        $this->envios[] = $envio;

        return $this;
    }
    
    /**
     * Add envío to orden.
     *
     * @param \App\Entity\Envio $envio
     *
     * @return Orden
     */
    public function addEnvioToOrden(\App\Entity\Envio $envio, $cantidad)
    {
        $envioToOrden = new EnvioPorOrden();
        $envioToOrden -> setOrden($this);
        $envioToOrden -> setEnvio($envio);
        $envioToOrden -> setCantidad($cantidad);
        $envioToOrden -> setSubtotal($cantidad * $envio->getPrecio());
        $this->envios[] = $envioToOrden;

        return $this;
    }

    /**
     * Remove envio.
     *
     * @param \App\Entity\EnviosPorOrden $envio
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeEnvio(\App\Entity\EnviosPorOrden $envio)
    {
        return $this->envios->removeElement($envio);
    }

    /**
     * Get envios.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnvios()
    {
        return $this->envios;
    }
}
