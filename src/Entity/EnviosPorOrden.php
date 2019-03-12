<?php

namespace App\Entity;

/**
 * EnviosPorOrden
 */
class EnviosPorOrden
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var float
     */
    private $cantidad;

    /**
     * @var float
     */
    private $subtotal;

    /**
     * @var \App\Entity\Orden
     */
    private $orden;

    /**
     * @var \App\Entity\Envio
     */
    private $envio;


    /**
     * Set id.
     *
     * @param string $id
     *
     * @return EnviosPorOrden
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
     * Set cantidad.
     *
     * @param float $cantidad
     *
     * @return EnviosPorOrden
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad.
     *
     * @return float
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set subtotal.
     *
     * @param float $subtotal
     *
     * @return EnviosPorOrden
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal.
     *
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set orden.
     *
     * @param \App\Entity\Orden|null $orden
     *
     * @return EnviosPorOrden
     */
    public function setOrden(\App\Entity\Orden $orden = null)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden.
     *
     * @return \App\Entity\Orden|null
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set envio.
     *
     * @param \App\Entity\Envio|null $envio
     *
     * @return EnviosPorOrden
     */
    public function setEnvio(\App\Entity\Envio $envio = null)
    {
        $this->envio = $envio;

        return $this;
    }

    /**
     * Get envio.
     *
     * @return \App\Entity\Envio|null
     */
    public function getEnvio()
    {
        return $this->envio;
    }
}
