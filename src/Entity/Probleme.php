<?php

namespace App\Entity;

use App\Repository\ProblemeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProblemeRepository::class)]
class Probleme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'date')]
    private $date_panne;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_mise_maintenance;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $hasSolution;

    #[ORM\ManyToOne(targetEntity: Affection::class, inversedBy: 'problemes')]
    #[ORM\JoinColumn(nullable: false)]
    private $affection;

    #[ORM\OneToOne(mappedBy: 'probleme_resolu', targetEntity: Solution::class, cascade: ['persist', 'remove'])]
    private $solution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDatePanne(): ?\DateTimeInterface
    {
        return $this->date_panne;
    }

    public function setDatePanne(\DateTimeInterface $date_panne): self
    {
        $this->date_panne = $date_panne;

        return $this;
    }

    public function getDateMiseMaintenance(): ?\DateTimeInterface
    {
        return $this->date_mise_maintenance;
    }

    public function setDateMiseMaintenance(?\DateTimeInterface $date_mise_maintenance): self
    {
        $this->date_mise_maintenance = $date_mise_maintenance;

        return $this;
    }

    public function getHasSolution(): ?bool
    {
        return $this->hasSolution;
    }

    public function setHasSolution(?bool $hasSolution): self
    {
        $this->hasSolution = $hasSolution;

        return $this;
    }

    public function getAffection(): ?Affection
    {
        return $this->affection;
    }

    public function setAffection(?Affection $affection): self
    {
        $this->affection = $affection;

        return $this;
    }

    public function getSolution(): ?Solution
    {
        return $this->solution;
    }

    public function setSolution(Solution $solution): self
    {
        // set the owning side of the relation if necessary
        if ($solution->getProblemeResolu() !== $this) {
            $solution->setProblemeResolu($this);
        }

        $this->solution = $solution;

        return $this;
    }
}
