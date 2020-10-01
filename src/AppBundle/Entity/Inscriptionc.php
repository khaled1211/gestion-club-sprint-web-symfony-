<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscriptionc
 *
 * @ORM\Table(name="inscriptionc", indexes={@ORM\Index(name="IDX_6957387833CE2470", columns={"id_club"}), @ORM\Index(name="IDX_695738785E5C27E9", columns={"iduser"})})
 * @ORM\Entity
 */
class Inscriptionc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_club", type="integer", nullable=true)
     */
    private $idClub;

    /**
     * @var integer
     *
     * @ORM\Column(name="iduser", type="integer", nullable=true)
     */
    private $iduser;


}

