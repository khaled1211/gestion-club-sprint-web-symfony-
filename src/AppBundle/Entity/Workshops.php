<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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


}

