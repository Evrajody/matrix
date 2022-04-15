<?php

namespace App\Entity;

use App\Repository\PrestataireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestataireRepository::class)]
class Prestataire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_prestataire;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom_prestataire;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse_prestataire;

    #[ORM\OneToMany(mappedBy: 'prestataire', targetEntity: Service::class)]
    private $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrestataire(): ?string
    {
        return $this->nom_prestataire;
    }

    public function setNomPrestataire(string $nom_prestataire): self
    {
        $this->nom_prestataire = $nom_prestataire;

        return $this;
    }

    public function getPrenomPrestataire(): ?string
    {
        return $this->prenom_prestataire;
    }

    public function setPrenomPrestataire(string $prenom_prestataire): self
    {
        $this->prenom_prestataire = $prenom_prestataire;

        return $this;
    }

    public function getAdressePrestataire(): ?string
    {
        return $this->adresse_prestataire;
    }

    public function setAdressePrestataire(string $adresse_prestataire): self
    {
        $this->adresse_prestataire = $adresse_prestataire;

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
            $service->setPrestataire($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getPrestataire() === $this) {
                $service->setPrestataire(null);
            }
        }

        return $this;
    }
}
