<?php

namespace App\Entity;

use App\Repository\ConseillierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConseillierRepository::class)
 */
class Conseiller
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\ManyToMany(targetEntity=Langue::class, inversedBy="conseilliers")
     */
    private $languge;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $specialite;

    /**
     * @ORM\OneToMany(targetEntity=RDV::class, mappedBy="conseillier")
     */
    private $rdvs;

    /**
     * @ORM\ManyToMany(targetEntity=Creneau::class, inversedBy="conseillers")
     */
    private $Creneaux;


    public function __construct()
    {
        $this->languge = new ArrayCollection();
        $this->rdvs = new ArrayCollection();
        $this->Creneaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Langue[]
     */
    public function getLanguge(): Collection
    {
        return $this->languge;
    }

    public function addLanguge(Langue $languge): self
    {
        if (!$this->languge->contains($languge)) {
            $this->languge[] = $languge;
        }

        return $this;
    }

    public function removeLanguge(Langue $languge): self
    {
        $this->languge->removeElement($languge);

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(?string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * @return Collection|RDV[]
     */
    public function getRdvs(): Collection
    {
        return $this->rdvs;
    }

    public function addRdv(RDV $rdv): self
    {
        if (!$this->rdvs->contains($rdv)) {
            $this->rdvs[] = $rdv;
            $rdv->setConseiller($this);
        }

        return $this;
    }

    public function removeRdv(RDV $rdv): self
    {
        if ($this->rdvs->removeElement($rdv)) {
            // set the owning side to null (unless already changed)
            if ($rdv->getConseiller() === $this) {
                $rdv->setConseiller(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Creneau[]
     */
    public function getCreneaux(): Collection
    {
        return $this->Creneaux;
    }

    public function addCreneaux(Creneau $creneaux): self
    {
        if (!$this->Creneaux->contains($creneaux)) {
            $this->Creneaux[] = $creneaux;
        }

        return $this;
    }

    public function removeCreneaux(Creneau $creneaux): self
    {
        $this->Creneaux->removeElement($creneaux);

        return $this;
    }


}
