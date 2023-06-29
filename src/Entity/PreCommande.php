<?php

namespace App\Entity;

use App\Repository\PreCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PreCommandeRepository::class)]
class PreCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 63)]
    private ?string $nomStructure = null;

    #[ORM\Column(length: 63)]
    private ?string $nomDemandeur = null;

    #[ORM\Column(length: 63)]
    private ?string $prenomDemandeur = null;

    #[ORM\Column(length: 320,unique:true)]
    private ?string $emailDemandeur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStructure(): ?string
    {
        return $this->nomStructure;
    }

    public function setNomStructure(string $nomStructure): static
    {
        $this->nomStructure = $nomStructure;

        return $this;
    }

    public function getNomDemandeur(): ?string
    {
        return $this->nomDemandeur;
    }

    public function setNomDemandeur(string $nomDemandeur): static
    {
        $this->nomDemandeur = $nomDemandeur;

        return $this;
    }

    public function getPrenomDemandeur(): ?string
    {
        return $this->prenomDemandeur;
    }

    public function setPrenomDemandeur(string $prenomDemandeur): static
    {
        $this->prenomDemandeur = $prenomDemandeur;

        return $this;
    }

    public function getEmailDemandeur(): ?string
    {
        return $this->emailDemandeur;
    }

    public function setEmailDemandeur(string $emailDemandeur): static
    {
        $this->emailDemandeur = $emailDemandeur;

        return $this;
    }
}
