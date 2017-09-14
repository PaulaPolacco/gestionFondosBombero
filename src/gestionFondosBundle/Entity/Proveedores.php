<?php

namespace gestionFondosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use src\gestionSociosBundle\Entity\Personas as PERS;

/**
 * Proveedores
 *
 * @ORM\Table(name="proveedores")
 * @ORM\Entity(repositoryClass="gestionFondosBundle\Repository\ProveedoresRepository")
 */
class Proveedores
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
     * @ORM\Column(name="razon_social", type="string", length=255, unique=true)
     */
    private $razonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="cuit", type="string", length=255, unique=true)
     */
    private $cuit;

    /**
     * @var string
     *
     * @ORM\Column(name="email_corporativo", type="string", length=255, nullable=true)
     */
    private $emailCorporativo;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio", type="string", length=255, nullable=true)
     */
    private $domicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="localidad", type="string", length=255, nullable=true)
     */
    private $localidad;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_fax", type="string", length=255, nullable=true)
     */
    private $telefonoFax;

    /**
     * @var string
     *
     * @ORM\Column(name="banco", type="string", length=255, nullable=true)
     */
    private $banco;

    /**
     * @var string
     *
     * @ORM\Column(name="nro_cuenta", type="string", length=255, nullable=true, unique=true)
     */
    private $nroCuenta;

    /**
     * @var int
     *
     * @ORM\Column(name="cbu", type="bigint", nullable=true, unique=true)
     */
    private $cbu;

    /**
     * @var string
     *
     * @ORM\Column(name="datos_cheque", type="string", length=255, nullable=true)
     */
    private $datosCheque;

    /**
     * @ORM\OneToOne(targetEntity="personas")
     * @ORM\JoinColumn(name="persona", referencedColumnName="id", nullable=true)
     */
    private $persona;

    /**
    * @ORM\OneToMany(targetEntity="CajasDetalle", mappedBy="proveedor")
    */
    private $detallesCajas;

    /**
    * @ORM\OneToMany(targetEntity="CajasBancosDetalle", mappedBy="proveedor")
    */
    private $detallesCajasBancos;
    
    public function __construct()
    {
        $this->detallesCajas = new ArrayCollection();
        $this->detallesCajasBancos = new ArrayCollection();
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
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Proveedores
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set cuit
     *
     * @param string $cuit
     *
     * @return Proveedores
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;

        return $this;
    }

    /**
     * Get cuit
     *
     * @return string
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set emailCorporativo
     *
     * @param string $emailCorporativo
     *
     * @return Proveedores
     */
    public function setEmailCorporativo($emailCorporativo)
    {
        $this->emailCorporativo = $emailCorporativo;

        return $this;
    }

    /**
     * Get emailCorporativo
     *
     * @return string
     */
    public function getEmailCorporativo()
    {
        return $this->emailCorporativo;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     *
     * @return Proveedores
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     *
     * @return Proveedores
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set telefonoFax
     *
     * @param string $telefonoFax
     *
     * @return Proveedores
     */
    public function setTelefonoFax($telefonoFax)
    {
        $this->telefonoFax = $telefonoFax;

        return $this;
    }

    /**
     * Get telefonoFax
     *
     * @return string
     */
    public function getTelefonoFax()
    {
        return $this->telefonoFax;
    }

    /**
     * Set banco
     *
     * @param string $banco
     *
     * @return Proveedores
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get banco
     *
     * @return string
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * Set nroCuenta
     *
     * @param string $nroCuenta
     *
     * @return Proveedores
     */
    public function setNroCuenta($nroCuenta)
    {
        $this->nroCuenta = $nroCuenta;

        return $this;
    }

    /**
     * Get nroCuenta
     *
     * @return string
     */
    public function getNroCuenta()
    {
        return $this->nroCuenta;
    }

    /**
     * Set cbu
     *
     * @param integer $cbu
     *
     * @return Proveedores
     */
    public function setCbu($cbu)
    {
        $this->cbu = $cbu;

        return $this;
    }

    /**
     * Get cbu
     *
     * @return int
     */
    public function getCbu()
    {
        return $this->cbu;
    }

    /**
     * Set datosCheque
     *
     * @param string $datosCheque
     *
     * @return Proveedores
     */
    public function setDatosCheque($datosCheque)
    {
        $this->datosCheque = $datosCheque;

        return $this;
    }

    /**
     * Get datosCheque
     *
     * @return string
     */
    public function getDatosCheque()
    {
        return $this->datosCheque;
    }

    /**
     * Set persona
     *
     * @param integer $persona
     *
     * @return Proveedores
     */
    public function setPersona($persona)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return int
     */
    public function getPersona()
    {
        return $this->persona;
    }
}

