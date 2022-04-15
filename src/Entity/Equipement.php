<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $ref;

    #[ORM\Column(type: 'string', length: 255)]
    private $designation;

    #[ORM\Column(type: 'string', length: 255)]
    private $marque;

    #[ORM\Column(type: 'string', length: 255)]
    private $model;

    #[ORM\Column(type: 'float')]
    private $prix_achat;

    #[ORM\Column(type: 'date')]
    private $date_achat;

    #[ORM\Column(type: 'string', length: 255)]
    private $etat_utilisation;

    #[ORM\ManyToOne(targetEntity: Fournisseur::class, inversedBy: 'equipements')]
    #[ORM\JoinColumn(nullable: false)]
    private $fournisseur;

    #[ORM\OneToMany(mappedBy: 'equipement', targetEntity: Affection::class)]
    private $affections;

    #[ORM\OneToMany(mappedBy: 'equipement', targetEntity: Service::class)]
    private $services;

    
    public function __construct()
    {
        $this->affections = new ArrayCollection();
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prix_achat;
    }

    public function setPrixAchat(float $prix_achat): self
    {
        $this->prix_achat = $prix_achat;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(\DateTimeInterface $date_achat): self
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getEtatUtilisation(): ?string
    {
        return $this->etat_utilisation;
    }

    public function setEtatUtilisation(string $etat_utilisation): self
    {
        $this->etat_utilisation = $etat_utilisation;

        return $this;
    }

    public function getFournisseurId(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseurId(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * @return Collection<int, Affection>
     */
    public function getAffections(): Collection
    {
        return $this->affections;
    }

    public function addAffection(Affection $affection): self
    {
        if (!$this->affections->contains($affection)) {
            $this->affections[] = $affection;
            $affection->setEquipement($this);
        }

        return $this;
    }

    public function removeAffection(Affection $affection): self
    {
        if ($this->affections->removeElement($affection)) {
            // set the owning side to null (unless already changed)
            if ($affection->getEquipement() === $this) {
                $affection->setEquipement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setEquipement($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getEquipement() === $this) {
                $service->setEquipement(null);
            }
        }

        return $this;
    }

   


}
