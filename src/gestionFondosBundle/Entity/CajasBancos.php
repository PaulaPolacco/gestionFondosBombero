<?php

namespace gestionFondosBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use gestionFondosBundle\Entity\Cajas;

use Doctrine\ORM\Mapping as ORM;

/**
 * CajasBancos
 *
 * @ORM\Table(name="cajas_bancos")
 * @ORM\Entity(repositoryClass="gestionFondosBundle\Repository\CajasBancosRepository")
 */
class CajasBancos extends Cajas
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
     * @ORM\Column(name="banco", type="string", length=255, unique=true)
     */
    private $banco;

    /**
     * @var string
     *
     * @ORM\Column(name="nro_cuenta", type="string", length=255, unique=true)
     */
    private $nroCuenta;

    /**
     * @var int
     *
     * @ORM\Column(name="cbu", type="bigint", unique=true)
     */
    private $cbu;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, unique=true)
     */
    private $alias;

    /**
    * @ORM\OneToMany(targetEntity="CajasBancosDetalle", mappedBy="idCajaBanco")
    */
    private $detalles;
    
    public function __construct()
    {
        $this->detalles = new ArrayCollection();
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
     * Set banco
     *
     * @param string $banco
     *
     * @return CajasBancos
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
     * @return CajasBancos
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
     * @return CajasBancos
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
     * Set alias
     *
     * @param string $alias
     *
     * @return CajasBancos
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }
}

