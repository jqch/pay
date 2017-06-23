<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table(name="persona", indexes={@ORM\Index(name="departamento_tipo_fk", columns={"departamento_tipo_id"}), @ORM\Index(name="genero_tipo_id", columns={"genero_tipo_id"})})
 * @ORM\Entity
 */
class Persona
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="carnet", type="string", length=50, nullable=false)
     */
    private $carnet;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="paterno", type="string", length=50, nullable=true)
     */
    private $paterno;

    /**
     * @var string
     *
     * @ORM\Column(name="materno", type="string", length=50, nullable=true)
     */
    private $materno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255, nullable=true)
     */
    private $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=true)
     */
    private $direccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime", nullable=true)
     */
    private $fechaRegistro;

    /**
     * @var \DepartamentoTipo
     *
     * @ORM\ManyToOne(targetEntity="DepartamentoTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departamento_tipo_id", referencedColumnName="id")
     * })
     */
    private $departamentoTipo;

    /**
     * @var \GeneroTipo
     *
     * @ORM\ManyToOne(targetEntity="GeneroTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="genero_tipo_id", referencedColumnName="id")
     * })
     */
    private $generoTipo;

    public function __toString(){
        return $this->nombre.' '.$this->paterno;
    }

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
     * Set carnet
     *
     * @param string $carnet
     *
     * @return Persona
     */
    public function setCarnet($carnet)
    {
        $this->carnet = $carnet;

        return $this;
    }

    /**
     * Get carnet
     *
     * @return string
     */
    public function getCarnet()
    {
        return $this->carnet;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Persona
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set paterno
     *
     * @param string $paterno
     *
     * @return Persona
     */
    public function setPaterno($paterno)
    {
        $this->paterno = $paterno;

        return $this;
    }

    /**
     * Get paterno
     *
     * @return string
     */
    public function getPaterno()
    {
        return $this->paterno;
    }

    /**
     * Set materno
     *
     * @param string $materno
     *
     * @return Persona
     */
    public function setMaterno($materno)
    {
        $this->materno = $materno;

        return $this;
    }

    /**
     * Get materno
     *
     * @return string
     */
    public function getMaterno()
    {
        return $this->materno;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Persona
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Persona
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Persona
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Persona
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     *
     * @return Persona
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set departamentoTipo
     *
     * @param \AppBundle\Entity\DepartamentoTipo $departamentoTipo
     *
     * @return Persona
     */
    public function setDepartamentoTipo(\AppBundle\Entity\DepartamentoTipo $departamentoTipo = null)
    {
        $this->departamentoTipo = $departamentoTipo;

        return $this;
    }

    /**
     * Get departamentoTipo
     *
     * @return \AppBundle\Entity\DepartamentoTipo
     */
    public function getDepartamentoTipo()
    {
        return $this->departamentoTipo;
    }

    /**
     * Set generoTipo
     *
     * @param \AppBundle\Entity\GeneroTipo $generoTipo
     *
     * @return Persona
     */
    public function setGeneroTipo(\AppBundle\Entity\GeneroTipo $generoTipo = null)
    {
        $this->generoTipo = $generoTipo;

        return $this;
    }

    /**
     * Get generoTipo
     *
     * @return \AppBundle\Entity\GeneroTipo
     */
    public function getGeneroTipo()
    {
        return $this->generoTipo;
    }
}
