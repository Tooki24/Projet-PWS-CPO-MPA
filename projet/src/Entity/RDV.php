<?php

namespace App\Entity;

use App\Repository\RDVRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RDVRepository::class)
 */
class RDV
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity=Creneau::class, inversedBy="rDVs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $creneau;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="rDVs")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Conseiller::class, inversedBy="rdvs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conseillers;




    public function __construct()
    {
        $this->conseillers = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreneau(): ?Creneau
    {
        return $this->creneau;
    }

    public function setCreneau(?Creneau $creneau): self
    {
        $this->creneau = $creneau;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getConseiller(): ?Conseiller
    {
        return $this->conseillers;
    }

    public function setConseiller(?Conseiller $conseiller): self
    {
        $this->conseillers = $conseiller;

        return $this;
    }
}
