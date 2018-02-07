<?php

namespace ZanimauxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RendezVous
 *
 * @ORM\Table(name="rendez_vous", indexes={@ORM\Index(name="IDX_E37425DDFE6E88D7", columns={"idUser"}), @ORM\Index(name="IDX_E37425DDA455ACCF", columns={"idClient"})})
 * @ORM\Entity
 */
class RendezVous
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRDV", type="datetime", nullable=false)
     */
    private $daterdv;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="cin")
     * })
     */
    private $idclient;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="cin")
     * })
     */
    private $iduser;


}

