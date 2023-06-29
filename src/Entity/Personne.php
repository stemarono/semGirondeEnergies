<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 63)]
    private ?string $nomPersonne = null;

    #[ORM\Column(length: 63)]
    private ?string $prenomPersonne = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateModification = null;

    #[ORM\ManyToOne(inversedBy: 'personnes')]
    private ?Actionnaire $actionnaire = null;

    #[ORM\ManyToOne(inversedBy: 'personnes')]
    private ?Fonction $fonction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPersonne(): ?string
    {
        return $this->nomPersonne;
    }

    public function setNomPersonne(string $nomPersonne): static
    {
        $this->nomPersonne = $nomPersonne;

        return $this;
    }

    public function getPrenomPersonne(): ?string
    {
        return $this->prenomPersonne;
    }

    public function setPrenomPersonne(string $prenomPersonne): static
    {
        $this->prenomPersonne = $prenomPersonne;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): static
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->DateModification;
    }

    public function setDateModification(\DateTimeInterface $DateModification): static
    {
        $this->DateModification = $DateModification;

        return $this;
    }

    public function getActionnaire(): ?Actionnaire
    {
        return $this->actionnaire;
    }

    public function setActionnaire(?Actionnaire $actionnaire): static
    {
        $this->actionnaire = $actionnaire;

        return $this;
    }

    public function getFonction(): ?Fonction
    {
        return $this->fonction;
    }

    public function setFonction(?Fonction $fonction): static
    {
        $this->fonction = $fonction;

        return $this;
    }
}
