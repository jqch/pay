<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrazoTipo
 *
 * @ORM\Table(name="brazo_tipo")
 * @ORM\Entity
 */
class BrazoTipo
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
     * @ORM\Column(name="brazo", type="string", length=20, nullable=false)
     */
    private $brazo;

    public function __toString(){
        return $this->brazo;
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
     * Set brazo
     *
     * @param string $brazo
     *
     * @return BrazoTipo
     */
    public function setBrazo($brazo)
    {
        $this->brazo = $brazo;

        return $this;
    }

    /**
     * Get brazo
     *
     * @return string
     */
    public function getBrazo()
    {
        return $this->brazo;
    }
}
