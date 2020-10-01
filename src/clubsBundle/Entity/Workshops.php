<?php

namespace clubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Workshops
 *
 * @ORM\Table(name="workshops", indexes={@ORM\Index(name="nom_club", columns={"nom_club"})})
 * @ORM\Entity
 */
class Workshops
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_workshop", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idWorkshop;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_club", type="string", length=255, nullable=false)
     * @Assert\Regex(pattern="/[A-Za-z]$/", message="saisie une chaine de charactere")
     */
    private $nomClub;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="heure_debut_seance", type="integer", nullable=false)
     */
    private $heureDebutSeance;

    /**
     * @return int
     */
    public function getIdWorkshop()
    {
        return $this->idWorkshop;
    }

    /**
     * @param int $idWorkshop
     */
    public function setIdWorkshop($idWorkshop)
    {
        $this->idWorkshop = $idWorkshop;
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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getHeureDebutSeance()
    {
        return $this->heureDebutSeance;
    }

    /**
     * @param int $heureDebutSeance
     */
    public function setHeureDebutSeance($heureDebutSeance)
    {
        $this->heureDebutSeance = $heureDebutSeance;
    }


}

