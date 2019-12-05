<?php

namespace clubsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscriptionc
 *
 * @ORM\Table(name="inscriptionc", indexes={@ORM\Index(name="IDX_6957387833CE2470", columns={"id_club"}), @ORM\Index(name="IDX_69573878FE6E88D7", columns={"idUser"})})
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
     * @ORM\ManyToOne(targetEntity="Club", inversedBy="inscriptions")
     * @ORM\JoinColumn(name="id_Club", referencedColumnName="id_club")
     */
    private $club;


    /**
     * @ORM\ManyToOne(targetEntity="FosUser", inversedBy="inscriptions")
     * @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     */
    protected $FosUser;


    /**
     * @return mixed
     */


    public function getFosUser()
    {
        return $this->FosUser;
    }

    /**
     * @param mixed $FosUser
     */
    public function setFosUser($FosUser)
    {
        $this->FosUser = $FosUser;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($club)
    {
        $this->club = $club;
    }

    public function setUser($FosUser)
    {$this->FosUser = $FosUser;
    }


}

