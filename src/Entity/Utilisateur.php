<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_utilisateur;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom_utilisateur;

    #[ORM\Column(type: 'string', length: 255)]
    private $email_utilisateur;

    #[ORM\Column(type: 'string')]
    private $phone_utilisateur;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $adresse_utilisateur;

    #[ORM\Column(type: 'date')]
    private $date_naissance;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photo;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Affection::class, orphanRemoval: true)]
    private $affections;

    public function __construct()
    {
        $this->affections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nom_utilisateur;
    }

    public function setNomUtilisateur(string $nom_utilisateur): self
    {
        $this->nom_utilisateur = $nom_utilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenom_utilisateur;
    }

    public function setPrenomUtilisateur(string $prenom_utilisateur): self
    {
        $this->prenom_utilisateur = $prenom_utilisateur;

        return $this;
    }

    public function getEmailUtilisateur(): ?string
    {
        return $this->email_utilisateur;
    }

    public function setEmailUtilisateur(string $email_utilisateur): self
    {
        $this->email_utilisateur = $email_utilisateur;

        return $this;
    }

    public function getPhoneUtilisateur(): ?string
    {
        return $this->phone_utilisateur;
    }

    public function setPhoneUtilisateur(string $phone_utilisateur): self
    {
        $this->phone_utilisateur = $phone_utilisateur;

        return $this;
    }

    public function getAdresseUtilisateur(): ?string
    {
        return $this->adresse_utilisateur;
    }

    public function setAdresseUtilisateur(?string $adresse_utilisateur): self
    {
        $this->adresse_utilisateur = $adresse_utilisateur;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

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
            $affection->setUtilisateur($this);
        }

        return $this;
    }

    public function removeAffection(Affection $affection): self
    {
        if ($this->affections->removeElement($affection)) {
            // set the owning side to null (unless already changed)
            if ($affection->getUtilisateur() === $this) {
                $affection->setUtilisateur(null);
            }
        }

        return $this;
    }
}
