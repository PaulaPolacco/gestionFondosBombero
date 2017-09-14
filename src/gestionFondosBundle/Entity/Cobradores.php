<?php

namespace gestionFondosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cobradores
 *
 * @ORM\Table(name="cobradores")
 * @ORM\Entity(repositoryClass="gestionFondosBundle\Repository\CobradoresRepository")
 */
class Cobradores
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
     * @ORM\OneToOne(targetEntity="Personas")
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
     * @var string
     *
     * @ORM\Column(name="zona_asignada", type="string", length=255, nullable=true)
     */
    private $zonaAsignada;

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
     * @return Cobradores
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
     * @return Cobradores
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
     * Set zonaAsignada
     *
     * @param string $zonaAsignada
     *
     * @return Cobradores
     */
    public function setZonaAsignada($zonaAsignada)
    {
        $this->zonaAsignada = $zonaAsignada;

        return $this;
    }

    /**
     * Get zonaAsignada
     *
     * @return string
     */
    public function getZonaAsignada()
    {
        return $this->zonaAsignada;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     *
     * @return Cobradores
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
     * @return Cobradores
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

