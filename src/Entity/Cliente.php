<?php

namespace App\Entity;
use Ramsey\Uuid\Uuid;
/**
 * Cliente
 */
class Cliente
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $rol;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellidos;

    /**
     * @var \DateTime|null
     */
    private $nacimiento;

    /**
     * @var string|null
     */
    private $telefono;

    /**
     * @var string|null
     */
    private $correo;

    /**
     * @var string|null
     */
    private $contrasena;

    /**
     * @var string|null
     */
    private $direccion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ordenes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4()->toString();
        $this->ordenes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id.
     *
     * @param string $id
     *
     * @return Cliente
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
     * Set rol.
     *
     * @param string $rol
     *
     * @return Cliente
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol.
     *
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return Cliente
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
     * Set apellidos.
     *
     * @param string $apellidos
     *
     * @return Cliente
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos.
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set nacimiento.
     *
     * @param \DateTime|null $nacimiento
     *
     * @return Cliente
     */
    public function setNacimiento($nacimiento = null)
    {
        $this->nacimiento = $nacimiento;

        return $this;
    }

    /**
     * Get nacimiento.
     *
     * @return \DateTime|null
     */
    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    /**
     * Set telefono.
     *
     * @param string|null $telefono
     *
     * @return Cliente
     */
    public function setTelefono($telefono = null)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono.
     *
     * @return string|null
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set correo.
     *
     * @param string|null $correo
     *
     * @return Cliente
     */
    public function setCorreo($correo = null)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo.
     *
     * @return string|null
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set contrasena.
     *
     * @param string|null $contrasena
     *
     * @return Cliente
     */
    public function setContrasena($contrasena = null)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get contrasena.
     *
     * @return string|null
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set direccion.
     *
     * @param string|null $direccion
     *
     * @return Cliente
     */
    public function setDireccion($direccion = null)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion.
     *
     * @return string|null
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Add ordene.
     *
     * @param \App\Entity\Orden $ordene
     *
     * @return Cliente
     */
    public function addOrdene(\App\Entity\Orden $ordene)
    {
        $this->ordenes[] = $ordene;

        return $this;
    }

    /**
     * Remove ordene.
     *
     * @param \App\Entity\Orden $ordene
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOrdene(\App\Entity\Orden $ordene)
    {
        return $this->ordenes->removeElement($ordene);
    }

    /**
     * Get ordenes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrdenes()
    {
        return $this->ordenes;
    }
    /**
     * @var float|null
     */
    private $descuento;


    /**
     * Set descuento.
     *
     * @param float|null $descuento
     *
     * @return Cliente
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
}
