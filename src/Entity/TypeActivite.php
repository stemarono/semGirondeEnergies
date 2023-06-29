<?php

namespace App\Entity;

use App\Repository\TypeActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeActiviteRepository::class)]
class TypeActivite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50,unique:true)]
    private ?string $typeActivite = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $descriptionTypeActivite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateModification = null;

    #[ORM\OneToMany(mappedBy: 'typeActivite', targetEntity: Activite::class)]
    private Collection $activites;

    #[ORM\OneToMany(mappedBy: 'typeActivite', targetEntity: PreCommande::class)]
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

    public function getTypeActivite(): ?string
    {
        return $this->typeActivite;
    }

    public function setTypeActivite(string $typeActivite): static
    {
        $this->typeActivite = $typeActivite;

        return $this;
    }

    public function getDescriptionTypeActivite(): ?string
    {
        return $this->descriptionTypeActivite;
    }

    public function setDescriptionTypeActivite(?string $descriptionTypeActivite): static
    {
        $this->descriptionTypeActivite = $descriptionTypeActivite;

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
            $activite->setTypeActivite($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): static
    {
        if ($this->activites->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getTypeActivite() === $this) {
                $activite->setTypeActivite(null);
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
            $preCommande->setTypeActivite($this);
        }

        return $this;
    }

    public function removePreCommande(PreCommande $preCommande): static
    {
        if ($this->preCommandes->removeElement($preCommande)) {
            // set the owning side to null (unless already changed)
            if ($preCommande->getTypeActivite() === $this) {
                $preCommande->setTypeActivite(null);
            }
        }

        return $this;
    }
}
