<?php

namespace App\Entity;

use App\Repository\CreneauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreneauRepository::class)
 */
class Creneau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\OneToMany(targetEntity=RDV::class, mappedBy="creneau")
     */
    private $rDVs;

    /**
     * @ORM\ManyToMany(targetEntity=Conseiller::class, mappedBy="Creneaux")
     */
    private $conseillers;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $semaine;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureDebut;

    public function __construct()
    {
        $this->rDVs = new ArrayCollection();
        $this->conseillers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return Collection|RDV[]
     */
    public function getRDVs(): Collection
    {
        return $this->rDVs;
    }

    public function addRDV(RDV $rDV): self
    {
        if (!$this->rDVs->contains($rDV)) {
            $this->rDVs[] = $rDV;
            $rDV->setCreneau($this);
        }

        return $this;
    }

    public function removeRDV(RDV $rDV): self
    {
        if ($this->rDVs->removeElement($rDV)) {
            // set the owning side to null (unless already changed)
            if ($rDV->getCreneau() === $this) {
                $rDV->setCreneau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Conseiller[]
     */
    public function getConseillers(): Collection
    {
        return $this->conseillers;
    }

    public function addConseiller(Conseiller $conseiller): self
    {
        if (!$this->conseillers->contains($conseiller)) {
            $this->conseillers[] = $conseiller;
            $conseiller->addCreneaux($this);
        }

        return $this;
    }

    public function removeConseiller(Conseiller $conseiller): self
    {
        if ($this->conseillers->removeElement($conseiller)) {
            $conseiller->removeCreneaux($this);
        }

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSemaine(): ?string
    {
        return $this->semaine;
    }

    public function setSemaine(string $semaine): self
    {
        $this->semaine = $semaine;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }
}
