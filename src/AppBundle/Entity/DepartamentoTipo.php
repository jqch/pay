<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DepartamentoTipo
 *
 * @ORM\Table(name="departamento_tipo", indexes={@ORM\Index(name="fk_pais", columns={"pais_tipo_id"})})
 * @ORM\Entity
 */
class DepartamentoTipo
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
     * @ORM\Column(name="departamento", type="string", length=255, nullable=false)
     */
    private $departamento;

    /**
     * @var string
     *
     * @ORM\Column(name="abrev", type="string", length=5, nullable=true)
     */
    private $abrev;

    /**
     * @var \PaisTipo
     *
     * @ORM\ManyToOne(targetEntity="PaisTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_tipo_id", referencedColumnName="id")
     * })
     */
    private $paisTipo;

    public function __toString(){
        return $this->departamento;
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
     * Set departamento
     *
     * @param string $departamento
     *
     * @return DepartamentoTipo
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set abrev
     *
     * @param string $abrev
     *
     * @return DepartamentoTipo
     */
    public function setAbrev($abrev)
    {
        $this->abrev = $abrev;

        return $this;
    }

    /**
     * Get abrev
     *
     * @return string
     */
    public function getAbrev()
    {
        return $this->abrev;
    }

    /**
     * Set paisTipo
     *
     * @param \AppBundle\Entity\PaisTipo $paisTipo
     *
     * @return DepartamentoTipo
     */
    public function setPaisTipo(\AppBundle\Entity\PaisTipo $paisTipo = null)
    {
        $this->paisTipo = $paisTipo;

        return $this;
    }

    /**
     * Get paisTipo
     *
     * @return \AppBundle\Entity\PaisTipo
     */
    public function getPaisTipo()
    {
        return $this->paisTipo;
    }
}
