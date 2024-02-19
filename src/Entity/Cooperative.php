<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CooperativeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CooperativeRepository::class)]
#[ApiResource]
class Cooperative
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomCooperative = null;

    #[ORM\OneToMany(targetEntity: Voiture::class, mappedBy: 'cooperative')]
    private Collection $voitures;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCooperative(): ?string
    {
        return $this->nomCooperative;
    }

    public function setNomCooperative(string $nomCooperative): static
    {
        $this->nomCooperative = $nomCooperative;

        return $this;
    }

    /**
     * @return Collection<int, Voiture>
     */
    public function getVoitures(): Collection
    {
        return $this->voitures;
    }

    public function addVoiture(Voiture $voiture): static
    {
        if (!$this->voitures->contains($voiture)) {
            $this->voitures->add($voiture);
            $voiture->setCooperative($this);
        }

        return $this;
    }

    public function removeVoiture(Voiture $voiture): static
    {
        if ($this->voitures->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getCooperative() === $this) {
                $voiture->setCooperative(null);
            }
        }

        return $this;
    }
}
