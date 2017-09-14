<?php

namespace gestionFondosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FichaEnCampania
 *
 * @ORM\Table(name="ficha_en_campania")
 * @ORM\Entity(repositoryClass="gestionFondosBundle\Repository\FichaEnCampaniaRepository")
 */
class FichaEnCampania
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
     * @ORM\ManyToOne(targetEntity="Campania", inversedBy="fichas")
     * @ORM\JoinColumn(name="idCampania", referencedColumnName="id")
     */
    private $idCampania;

    /**
     * @ORM\ManyToOne(targetEntity="Fichas", inversedBy="fichas")
     * @ORM\JoinColumn(name="idFicha", referencedColumnName="id")
     */
    private $idFicha;


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
     * Set idCampania
     *
     * @param integer $idCampania
     *
     * @return FichaEnCampania
     */
    public function setIdCampania($idCampania)
    {
        $this->idCampania = $idCampania;

        return $this;
    }

    /**
     * Get idCampania
     *
     * @return int
     */
    public function getIdCampania()
    {
        return $this->idCampania;
    }

    /**
     * Set idFicha
     *
     * @param integer $idFicha
     *
     * @return FichaEnCampania
     */
    public function setIdFicha($idFicha)
    {
        $this->idFicha = $idFicha;

        return $this;
    }

    /**
     * Get idFicha
     *
     * @return int
     */
    public function getIdFicha()
    {
        return $this->idFicha;
    }
}

