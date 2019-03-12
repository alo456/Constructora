<?php

namespace App\Entity;
use Ramsey\Uuid\Uuid;
/**
 * Servicio
 */
class Servicio
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var float
     */
    private $precio;

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
     * @return Servicio
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
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return Servicio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set precio.
     *
     * @param float $precio
     *
     * @return Servicio
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
     * Add concepto.
     *
     * @param \App\Entity\MaterialesPorServicio $concepto
     *
     * @return Servicio
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
     * @param \App\Entity\ServiciosPorOrden $orden
     *
     * @return Servicio
     */
    public function addOrden(\App\Entity\ServiciosPorOrden $orden)
    {
        $this->orden[] = $orden;

        return $this;
    }

    /**
     * Remove orden.
     *
     * @param \App\Entity\ServiciosPorOrden $orden
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOrden(\App\Entity\ServiciosPorOrden $orden)
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
