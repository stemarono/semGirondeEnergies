<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommuneRepository::class)]
class Commune
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 63)]
    private ?string $nomCommune = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateModification = null;

    #[ORM\OneToMany(mappedBy: 'commune', targetEntity: Activite::class)]
    private Collection $activites;

    #[ORM\OneToMany(mappedBy: 'commune', targetEntity: PreCommande::class)]
    private Collection $preCommandes;

    public function __construct()
    {
        $this->activites = new ArrayCollection();
        $this->preCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommune(): ?string
    {
        return $this->nomCommune;
    }

    public function setNomCommune(string $nomCommune): static
    {
        $this->nomCommune = $nomCommune;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(\DateTimeInterface $dateModification): static
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * @return Collection<int, Activite>
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activite $activite): static
    {
        if (!$this->activites->contains($activite)) {
            $this->activites->add($activite);
            $activite->setCommune($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): static
    {
        if ($this->activites->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getCommune() === $this) {
                $activite->setCommune(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PreCommande>
     */
    public function getPreCommandes(): Collection
    {
        return $this->preCommandes;
    }

    public function addPreCommande(PreCommande $preCommande): static
    {
        if (!$this->preCommandes->contains($preCommande)) {
            $this->preCommandes->add($preCommande);
            $preCommande->setCommune($this);
        }

        return $this;
    }

    public function removePreCommande(PreCommande $preCommande): static
    {
        if ($this->preCommandes->removeElement($preCommande)) {
            // set the owning side to null (unless already changed)
            if ($preCommande->getCommune() === $this) {
                $preCommande->setCommune(null);
            }
        }

        return $this;
    }
}
