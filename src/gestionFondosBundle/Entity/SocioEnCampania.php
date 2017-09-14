<?php

namespace gestionFondosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SocioEnCampania
 *
 * @ORM\Table(name="socio_en_campania")
 * @ORM\Entity(repositoryClass="gestionFondosBundle\Repository\SocioEnCampaniaRepository")
 */
class SocioEnCampania
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
     * @ORM\ManyToOne(targetEntity="Socios", inversedBy="socioEnCampanias")
     * @ORM\JoinColumn(name="idSocio", referencedColumnName="id")
     */
    private $idSocio;


    /**
     * @ORM\OneToOne(targetEntity="FichaEnCampania")
     * @ORM\JoinColumn(name="idFichaEnCampania", referencedColumnName="id", nullable=true)
     */
    private $idFichaEnCampania;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1)
     */
    private $estado;

    /**
    * @ORM\OneToMany(targetEntity="CuotasSocios", mappedBy="idSocioEnCampania")
    */
    private $cuotas;

    public function __construct()
    {
        $this->cuotas = new ArrayCollection();
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
     * Set idSocio
     *
     * @param integer $idSocio
     *
     * @return SocioEnCampania
     */
    public function setIdSocio($idSocio)
    {
        $this->idSocio = $idSocio;

        return $this;
    }

    /**
     * Get idSocio
     *
     * @return int
     */
    public function getIdSocio()
    {
        return $this->idSocio;
    }

    /**
     * Set idFichaEnCampania
     *
     * @param integer $idFichaEnCampania
     *
     * @return SocioEnCampania
     */
    public function setIdFichaEnCampania($idFichaEnCampania)
    {
        $this->idFichaEnCampania = $idFichaEnCampania;

        return $this;
    }

    /**
     * Get idFichaEnCampania
     *
     * @return int
     */
    public function getIdFichaEnCampania()
    {
        return $this->idFichaEnCampania;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return SocioEnCampania
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

