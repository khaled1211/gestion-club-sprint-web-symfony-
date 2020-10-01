<?php

namespace Inscription\InscriptionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity
 */
class Club
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_club", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClub;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_club", type="string", length=255, nullable=false)
     * @Assert\Regex(pattern="/[A-Za-z]$/", message="saisie une chaine de charactere")
     */
    private $nomClub;

    /**
     * @var string
     *
     * @ORM\Column(name="domaine_club", type="string", length=255, nullable=false)
     * @Assert\Regex(pattern="/[A-Za-z]$/", message="saisie une chaine de charactere")
     */
    private $domaineClub;

    /**
     * @var integer
     *
     * @ORM\Column(name="placeDesponible_club", type="integer", nullable=false)
     */
    private $placedesponibleClub;

    /**
     * @return int
     */
    public function getIdClub()
    {
        return $this->idClub;
    }

    /**
     * @param int $idClub
     */
    public function setIdClub($idClub)
    {
        $this->idClub = $idClub;
    }

    /**
     * @return string
     */
    public function getNomClub()
    {
        return $this->nomClub;
    }

    /**
     * @param string $nomClub
     */
    public function setNomClub($nomClub)
    {
        $this->nomClub = $nomClub;
    }

    /**
     * @return string
     */
    public function getDomaineClub()
    {
        return $this->domaineClub;
    }

    /**
     * @param string $domaineClub
     */
    public function setDomaineClub($domaineClub)
    {
        $this->domaineClub = $domaineClub;
    }

    /**
     * @return int
     */
    public function getPlacedesponibleClub()
    {
        return $this->placedesponibleClub;
    }

    /**
     * @param int $placedesponibleClub
     */
    public function setPlacedesponibleClub($placedesponibleClub)
    {
        $this->placedesponibleClub = $placedesponibleClub;
    }
    /**
     * @ORM\OneToMany(targetEntity="Inscriptionc", mappedBy="club")
     */
    private $inscriptions;

    /**
     * @return ArrayCollection
     */
    public function getInscriptions()
    {
        return $this->inscriptions;
    }

    /**
     * @param ArrayCollection $inscriptions
     */
    public function setInscriptions($inscriptions)
    {
        $this->inscriptions = $inscriptions;
    }

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();

    }


}


