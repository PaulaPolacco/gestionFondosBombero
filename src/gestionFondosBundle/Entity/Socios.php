<?php

namespace gestionFondosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Socios
 *
 * @ORM\Table(name="socios")
 * @ORM\Entity(repositoryClass="gestionFondosBundle\Repository\SociosRepository")
 */
class Socios
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
     * @ORM\OneToOne(targetEntity="Personas", inversedBy="proveedor")
     * @ORM\JoinColumn(name="idPersona", referencedColumnName="id", nullable=true)
     */
    private $idPersona;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="date")
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="date", nullable=true)
     */
    private $fechaBaja;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1)
     */
    private $estado;

    /**
    * @ORM\OneToMany(targetEntity="SocioEnCampania", mappedBy="idSocio")
    */
    private $SocioEnCampanias;

    public function __construct()
    {
        $this->socioEnCampanias = new ArrayCollection();
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
     * Set idPersona
     *
     * @param integer $idPersona
     *
     * @return Socios
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return int
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     *
     * @return Socios
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     *
     * @return Socios
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Socios
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

