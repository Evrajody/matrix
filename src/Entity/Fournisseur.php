<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_fournisseur;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom_fournisseur;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse_fournisseur;

    #[ORM\Column(type: 'string', length: 255)]
    private $email_fournisseur;

    #[ORM\Column(type: 'bigint')]
    private $phone_fournisseur;

    #[ORM\OneToMany(mappedBy: 'fournisseur_id', targetEntity: Equipement::class)]
    private $equipements;

    public function __construct()
    {
        $this->equipements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFournisseur(): ?string
    {
        return $this->nom_fournisseur;
    }

    public function setNomFournisseur(string $nom_fournisseur): self
    {
        $this->nom_fournisseur = $nom_fournisseur;

        return $this;
    }

    public function getPrenomFournisseur(): ?string
    {
        return $this->prenom_fournisseur;
    }

    public function setPrenomFournisseur(string $prenom_fournisseur): self
    {
        $this->prenom_fournisseur = $prenom_fournisseur;

        return $this;
    }

    public function getAdresseFournisseur(): ?string
    {
        return $this->adresse_fournisseur;
    }

    public function setAdresseFournisseur(string $adresse_fournisseur): self
    {
        $this->adresse_fournisseur = $adresse_fournisseur;

        return $this;
    }

    public function getEmailFournisseur(): ?string
    {
        return $this->email_fournisseur;
    }

    public function setEmailFournisseur(string $email_fournisseur): self
    {
        $this->email_fournisseur = $email_fournisseur;

        return $this;
    }

    public function getPhoneFournisseur(): ?string
    {
        return $this->phone_fournisseur;
    }

    public function setPhoneFournisseur(string $phone_fournisseur): self
    {
        $this->phone_fournisseur = $phone_fournisseur;

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Equipement $equipement): self
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements[] = $equipement;
            $equipement->setFournisseurId($this);
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): self
    {
        if ($this->equipements->removeElement($equipement)) {
            // set the owning side to null (unless already changed)
            if ($equipement->getFournisseurId() === $this) {
                $equipement->setFournisseurId(null);
            }
        }

        return $this;
    }
}
