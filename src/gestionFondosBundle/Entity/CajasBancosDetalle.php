<?php

namespace gestionFondosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CajasBancosDetalle
 *
 * @ORM\Table(name="cajas_bancos_detalle")
 * @ORM\Entity(repositoryClass="gestionFondosBundle\Repository\CajasBancosDetalleRepository")
 */
class CajasBancosDetalle
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
     * @ORM\ManyToOne(targetEntity="CajasBancos", inversedBy="detalles")
     * @ORM\JoinColumn(name="idCajaBanco", referencedColumnName="id")
    */
    private $idCajaBanco;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="operacion_bancaria", type="string", length=255, nullable=true)
     */
    private $operacionBancaria;

    /**
    * @ORM\ManyToOne(targetEntity="Comprobantes", inversedBy="detallesCajasBancos")
    * @ORM\JoinColumn(name="tipoComprobante", referencedColumnName="id") 
    */
    private $tipoComprobante;

    /**
     * @var string
     *
     * @ORM\Column(name="nro_comprobante", type="string", length=255, nullable=true)
     */
    private $nroComprobante;

    /** 
    * @ORM\ManyToOne(targetEntity="Proveedores", inversedBy="detallesCajasBancos")
    * @ORM\JoinColumn(name="proveedor", referencedColumnName="id")
    */
    private $proveedor;

    /**
     * @var int
     *
     * @ORM\Column(name="socio", type="integer", nullable=true)
     */
    private $socio;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
    * @ORM\ManyToOne(targetEntity="Conceptos", inversedBy="detallesCajasBancos")
    * @ORM\JoinColumn(name="codigoConcepto", referencedColumnName="id")
    */
    private $codigoConcepto;

    /**
     * @var string
     *
     * @ORM\Column(name="debe", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $debe;

    /**
     * @var string
     *
     * @ORM\Column(name="haber", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $haber;

    /**
     * @var int
     *
     * @ORM\Column(name="tipo_ingreso", type="integer", nullable=true)
     */
    private $tipoIngreso;

    /**
     * @var int
     *
     * @ORM\Column(name="fondo_origen", type="integer", nullable=true)
     */
    private $fondoOrigen;


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
     * Set idCajaBanco
     *
     * @param integer $idCajaBanco
     *
     * @return CajasBancosDetalle
     */
    public function setIdCajaBanco($idCajaBanco)
    {
        $this->idCajaBanco = $idCajaBanco;

        return $this;
    }

    /**
     * Get idCajaBanco
     *
     * @return int
     */
    public function getIdCajaBanco()
    {
        return $this->idCajaBanco;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return CajasBancosDetalle
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

    /**
     * Set operacionBancaria
     *
     * @param string $operacionBancaria
     *
     * @return CajasBancosDetalle
     */
    public function setOperacionBancaria($operacionBancaria)
    {
        $this->operacionBancaria = $operacionBancaria;

        return $this;
    }

    /**
     * Get operacionBancaria
     *
     * @return string
     */
    public function getOperacionBancaria()
    {
        return $this->operacionBancaria;
    }

    /**
     * Set tipoComprobante
     *
     * @param integer $tipoComprobante
     *
     * @return CajasBancosDetalle
     */
    public function setTipoComprobante($tipoComprobante)
    {
        $this->tipoComprobante = $tipoComprobante;

        return $this;
    }

    /**
     * Get tipoComprobante
     *
     * @return int
     */
    public function getTipoComprobante()
    {
        return $this->tipoComprobante;
    }

    /**
     * Set nroComprobante
     *
     * @param string $nroComprobante
     *
     * @return CajasBancosDetalle
     */
    public function setNroComprobante($nroComprobante)
    {
        $this->nroComprobante = $nroComprobante;

        return $this;
    }

    /**
     * Get nroComprobante
     *
     * @return string
     */
    public function getNroComprobante()
    {
        return $this->nroComprobante;
    }

    /**
     * Set proveedor
     *
     * @param integer $proveedor
     *
     * @return CajasBancosDetalle
     */
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return int
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set socio
     *
     * @param integer $socio
     *
     * @return CajasBancosDetalle
     */
    public function setSocio($socio)
    {
        $this->socio = $socio;

        return $this;
    }

    /**
     * Get socio
     *
     * @return int
     */
    public function getSocio()
    {
        return $this->socio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return CajasBancosDetalle
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set codigoConcepto
     *
     * @param integer $codigoConcepto
     *
     * @return CajasBancosDetalle
     */
    public function setCodigoConcepto($codigoConcepto)
    {
        $this->codigoConcepto = $codigoConcepto;

        return $this;
    }

    /**
     * Get codigoConcepto
     *
     * @return int
     */
    public function getCodigoConcepto()
    {
        return $this->codigoConcepto;
    }

    /**
     * Set debe
     *
     * @param string $debe
     *
     * @return CajasBancosDetalle
     */
    public function setDebe($debe)
    {
        $this->debe = $debe;

        return $this;
    }

    /**
     * Get debe
     *
     * @return string
     */
    public function getDebe()
    {
        return $this->debe;
    }

    /**
     * Set haber
     *
     * @param string $haber
     *
     * @return CajasBancosDetalle
     */
    public function setHaber($haber)
    {
        $this->haber = $haber;

        return $this;
    }

    /**
     * Get haber
     *
     * @return string
     */
    public function getHaber()
    {
        return $this->haber;
    }

    /**
     * Set tipoIngreso
     *
     * @param integer $tipoIngreso
     *
     * @return CajasBancosDetalle
     */
    public function setTipoIngreso($tipoIngreso)
    {
        $this->tipoIngreso = $tipoIngreso;

        return $this;
    }

    /**
     * Get tipoIngreso
     *
     * @return int
     */
    public function getTipoIngreso()
    {
        return $this->tipoIngreso;
    }

    /**
     * Set fondoOrigen
     *
     * @param integer $fondoOrigen
     *
     * @return CajasBancosDetalle
     */
    public function setFondoOrigen($fondoOrigen)
    {
        $this->fondoOrigen = $fondoOrigen;

        return $this;
    }

    /**
     * Get fondoOrigen
     *
     * @return int
     */
    public function getFondoOrigen()
    {
        return $this->fondoOrigen;
    }
}

