<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
#[ApiResource]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $numero = null;

    #[ORM\Column]
    private ?int $nombrePlace = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    private ?Cooperative $cooperative = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNombrePlace(): ?int
    {
        return $this->nombrePlace;
    }

    public function setNombrePlace(int $nombrePlace): static
    {
        $this->nombrePlace = $nombrePlace;

        return $this;
    }

    public function getCooperative(): ?Cooperative
    {
        return $this->cooperative;
    }

    public function setCooperative(?Cooperative $cooperative): static
    {
        $this->cooperative = $cooperative;

        return $this;
    }
}
