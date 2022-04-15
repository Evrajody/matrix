<?php

namespace App\Entity;

use App\Repository\SolutionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SolutionRepository::class)]
class Solution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_remise;

    #[ORM\OneToOne(inversedBy: 'solution', targetEntity: Probleme::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $probleme_resolu;

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

    public function getDateRemise(): ?\DateTimeInterface
    {
        return $this->date_remise;
    }

    public function setDateRemise(?\DateTimeInterface $date_remise): self
    {
        $this->date_remise = $date_remise;

        return $this;
    }

    public function getProblemeResolu(): ?Probleme
    {
        return $this->probleme_resolu;
    }

    public function setProblemeResolu(Probleme $probleme_resolu): self
    {
        $this->probleme_resolu = $probleme_resolu;

        return $this;
    }
}
