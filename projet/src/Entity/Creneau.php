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
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDenut;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heureFin;

    /**
     * @ORM\OneToMany(targetEntity=RDV::class, mappedBy="creneau")
     */
    private $rDVs;

    /**
     * @ORM\ManyToMany(targetEntity=Conseiller::class, mappedBy="Creneaux")
     */
    private $conseillers;

    public function __construct()
    {
        $this->rDVs = new ArrayCollection();
        $this->conseillers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getHeureDenut(): ?\DateTimeInterface
    {
        return $this->heureDenut;
    }

    public function setHeureDenut(\DateTimeInterface $heureDenut): self
    {
        $this->heureDenut = $heureDenut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(?\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
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
}
