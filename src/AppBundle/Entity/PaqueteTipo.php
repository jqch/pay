<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaqueteTipo
 *
 * @ORM\Table(name="paquete_tipo")
 * @ORM\Entity
 */
class PaqueteTipo
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
     * @ORM\Column(name="paquete", type="string", length=255, nullable=true)
     */
    private $paquete;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_sus", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $precioSus;

    public function __toString(){
        return $this->paquete;
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
     * Set paquete
     *
     * @param string $paquete
     *
     * @return PaqueteTipo
     */
    public function setPaquete($paquete)
    {
        $this->paquete = $paquete;

        return $this;
    }

    /**
     * Get paquete
     *
     * @return string
     */
    public function getPaquete()
    {
        return $this->paquete;
    }

    /**
     * Set precioSus
     *
     * @param string $precioSus
     *
     * @return PaqueteTipo
     */
    public function setPrecioSus($precioSus)
    {
        $this->precioSus = $precioSus;

        return $this;
    }

    /**
     * Get precioSus
     *
     * @return string
     */
    public function getPrecioSus()
    {
        return $this->precioSus;
    }
}
