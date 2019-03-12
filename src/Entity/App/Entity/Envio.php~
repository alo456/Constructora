<?php

namespace App\Entity;
use Ramsey\Uuid\Uuid;
/**
 * Envio
 */
class Envio
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var float
     */
    private $precio;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $conceptos;

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
     * @return Envio
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
     * Set tipo.
     *
     * @param string $tipo
     *
     * @return Envio
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo.
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set precio.
     *
     * @param float $precio
     *
     * @return Envio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio.
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion.
     *
     * @param string $descripcion
     *
     * @return Envio
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Add concepto.
     *
     * @param \App\Entity\MaterialesPorServicio $concepto
     *
     * @return Envio
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $orden;


    /**
     * Add orden.
     *
     * @param \App\Entity\EnviosPorOrden $orden
     *
     * @return Envio
     */
    public function addOrden(\App\Entity\EnviosPorOrden $orden)
    {
        $this->orden[] = $orden;

        return $this;
    }

    /**
     * Remove orden.
     *
     * @param \App\Entity\EnviosPorOrden $orden
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOrden(\App\Entity\EnviosPorOrden $orden)
    {
        return $this->orden->removeElement($orden);
    }

    /**
     * Get orden.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrden()
    {
        return $this->orden;
    }
}
