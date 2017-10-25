<?php

namespace gestionFondosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CuotasSocios
 *
 * @ORM\Table(name="cuotas_socios")
 * @ORM\Entity(repositoryClass="gestionFondosBundle\Repository\CuotasSociosRepository")
 */
class CuotasSocios
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
     * @ORM\ManyToOne(targetEntity="SocioEnCampania", inversedBy="cuotas")
     * @ORM\JoinColumn(name="idSocioEnCampania", referencedColumnName="id")
     */
    private $idSocioEnCampania;

    /**
     * @ORM\OneToOne(targetEntity="Cobradores")
     * @ORM\JoinColumn(name="idCobrador", referencedColumnName="id", nullable=true)
     */
    private $idCobrador;

    /**
     * @var int
     *
     * @ORM\Column(name="nro_cuota", type="integer")
     */
    private $nroCuota;

    /**
     * @var string
     *
     * @ORM\Column(name="forma_pago", type="string", length=255)
     */
    private $formaPago;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;


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
     * Set idSocioEnCampania
     *
     * @param integer $idSocioEnCampania
     *
     * @return CuotasSocios
     */
    public function setIdSocioEnCampania($idSocioEnCampania)
    {
        $this->idSocioEnCampania = $idSocioEnCampania;

        return $this;
    }

    /**
     * Get idSocioEnCampania
     *
     * @return int
     */
    public function getIdSocioEnCampania()
    {
        return $this->idSocioEnCampania;
    }

    /**
     * Set idCobrador
     *
     * @param integer $idCobrador
     *
     * @return CuotasSocios
     */
    public function setIdCobrador($idCobrador)
    {
        $this->idCobrador = $idCobrador;

        return $this;
    }

    /**
     * Get idCobrador
     *
     * @return int
     */
    public function getIdCobrador()
    {
        return $this->idCobrador;
    }

    /**
     * Set nroCuota
     *
     * @param integer $nroCuota
     *
     * @return CuotasSocios
     */
    public function setNroCuota($nroCuota)
    {
        $this->nroCuota = $nroCuota;

        return $this;
    }

    /**
     * Get nroCuota
     *
     * @return int
     */
    public function getNroCuota()
    {
        return $this->nroCuota;
    }

    /**
     * Set formaPago
     *
     * @param string $formaPago
     *
     * @return CuotasSocios
     */
    public function setFormaPago($formaPago)
    {
        $this->formaPago = $formaPago;

        return $this;
    }

    /**
     * Get formaPago
     *
     * @return string
     */
    public function getFormaPago()
    {
        return $this->formaPago;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return CuotasSocios
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}

