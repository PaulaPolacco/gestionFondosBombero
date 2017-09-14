<?php

namespace gestionFondosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichas
 *
 * @ORM\Table(name="fichas")
 * @ORM\Entity(repositoryClass="gestionFondosBundle\Repository\FichasRepository")
 */
class Fichas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="importe", type="decimal", precision=10, scale=2)
     */
    private $importe;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;

    /**
    * @ORM\OneToMany(targetEntity="FichaEnCampania", mappedBy="idFicha")
    */
    private $fichas;

    public function __construct()
    {
        $this->fichas = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set importe
     *
     * @param string $importe
     *
     * @return Fichas
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return string
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Fichas
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }
}

