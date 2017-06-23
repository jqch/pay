<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registro
 *
 * @ORM\Table(name="registro", indexes={@ORM\Index(name="fk_brazo_tipo_id", columns={"brazo_tipo_id"}), @ORM\Index(name="fk_patrocinador_id", columns={"patrocinador_id"}), @ORM\Index(name="fk_persona_id", columns={"persona_id"}), @ORM\Index(name="fk_moneda_tipo_id", columns={"moneda_tipo_id"}), @ORM\Index(name="fk_paquete_tipo_id", columns={"paquete_tipo_id"})})
 * @ORM\Entity
 */
class Registro
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
     * @ORM\Column(name="correo", type="string", length=50, nullable=true)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_password", type="string", length=50, nullable=true)
     */
    private $correoPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=50, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=100, nullable=true)
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="documento_file", type="string", length=255, nullable=true)
     */
    private $documentoFile;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_pagado", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $montoPagado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime", nullable=true)
     */
    private $fechaRegistro;

    /**
     * @var \BrazoTipo
     *
     * @ORM\ManyToOne(targetEntity="BrazoTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="brazo_tipo_id", referencedColumnName="id")
     * })
     */
    private $brazoTipo;

    /**
     * @var \MonedaTipo
     *
     * @ORM\ManyToOne(targetEntity="MonedaTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="moneda_tipo_id", referencedColumnName="id")
     * })
     */
    private $monedaTipo;

    /**
     * @var \PaqueteTipo
     *
     * @ORM\ManyToOne(targetEntity="PaqueteTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paquete_tipo_id", referencedColumnName="id")
     * })
     */
    private $paqueteTipo;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patrocinador_id", referencedColumnName="id")
     * })
     */
    private $patrocinador;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     * })
     */
    private $persona;



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
     * Set correo
     *
     * @param string $correo
     *
     * @return Registro
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set correoPassword
     *
     * @param string $correoPassword
     *
     * @return Registro
     */
    public function setCorreoPassword($correoPassword)
    {
        $this->correoPassword = $correoPassword;

        return $this;
    }

    /**
     * Get correoPassword
     *
     * @return string
     */
    public function getCorreoPassword()
    {
        return $this->correoPassword;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     *
     * @return Registro
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Registro
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set documento
     *
     * @param string $documento
     *
     * @return Registro
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set documentoFile
     *
     * @param string $documentoFile
     *
     * @return Registro
     */
    public function setDocumentoFile($documentoFile)
    {
        $this->documentoFile = $documentoFile;

        return $this;
    }

    /**
     * Get documentoFile
     *
     * @return string
     */
    public function getDocumentoFile()
    {
        return $this->documentoFile;
    }

    /**
     * Set montoPagado
     *
     * @param string $montoPagado
     *
     * @return Registro
     */
    public function setMontoPagado($montoPagado)
    {
        $this->montoPagado = $montoPagado;

        return $this;
    }

    /**
     * Get montoPagado
     *
     * @return string
     */
    public function getMontoPagado()
    {
        return $this->montoPagado;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     *
     * @return Registro
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
     * Set brazoTipo
     *
     * @param \AppBundle\Entity\BrazoTipo $brazoTipo
     *
     * @return Registro
     */
    public function setBrazoTipo(\AppBundle\Entity\BrazoTipo $brazoTipo = null)
    {
        $this->brazoTipo = $brazoTipo;

        return $this;
    }

    /**
     * Get brazoTipo
     *
     * @return \AppBundle\Entity\BrazoTipo
     */
    public function getBrazoTipo()
    {
        return $this->brazoTipo;
    }

    /**
     * Set monedaTipo
     *
     * @param \AppBundle\Entity\MonedaTipo $monedaTipo
     *
     * @return Registro
     */
    public function setMonedaTipo(\AppBundle\Entity\MonedaTipo $monedaTipo = null)
    {
        $this->monedaTipo = $monedaTipo;

        return $this;
    }

    /**
     * Get monedaTipo
     *
     * @return \AppBundle\Entity\MonedaTipo
     */
    public function getMonedaTipo()
    {
        return $this->monedaTipo;
    }

    /**
     * Set paqueteTipo
     *
     * @param \AppBundle\Entity\PaqueteTipo $paqueteTipo
     *
     * @return Registro
     */
    public function setPaqueteTipo(\AppBundle\Entity\PaqueteTipo $paqueteTipo = null)
    {
        $this->paqueteTipo = $paqueteTipo;

        return $this;
    }

    /**
     * Get paqueteTipo
     *
     * @return \AppBundle\Entity\PaqueteTipo
     */
    public function getPaqueteTipo()
    {
        return $this->paqueteTipo;
    }

    /**
     * Set patrocinador
     *
     * @param \AppBundle\Entity\Persona $patrocinador
     *
     * @return Registro
     */
    public function setPatrocinador(\AppBundle\Entity\Persona $patrocinador = null)
    {
        $this->patrocinador = $patrocinador;

        return $this;
    }

    /**
     * Get patrocinador
     *
     * @return \AppBundle\Entity\Persona
     */
    public function getPatrocinador()
    {
        return $this->patrocinador;
    }

    /**
     * Set persona
     *
     * @param \AppBundle\Entity\Persona $persona
     *
     * @return Registro
     */
    public function setPersona(\AppBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \AppBundle\Entity\Persona
     */
    public function getPersona()
    {
        return $this->persona;
    }
}
