<?php

namespace App\Entity;

/**
 * RecursosPorOrden
 */
class RecursosPorOrden
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
     * @var \App\Entity\Recurso
     */
    private $recurso;


    /**
     * Set id.
     *
     * @param string $id
     *
     * @return RecursosPorOrden
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
     * @return RecursosPorOrden
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
     * @return RecursosPorOrden
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
     * @return RecursosPorOrden
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
     * Set recurso.
     *
     * @param \App\Entity\Recurso|null $recurso
     *
     * @return RecursosPorOrden
     */
    public function setRecurso(\App\Entity\Recurso $recurso = null)
    {
        $this->recurso = $recurso;

        return $this;
    }

    /**
     * Get recurso.
     *
     * @return \App\Entity\Recurso|null
     */
    public function getRecurso()
    {
        return $this->recurso;
    }
}
