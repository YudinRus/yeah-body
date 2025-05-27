<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Workout
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private string $name;

    #[ORM\Column]
    private int $weight;

    #[ORM\Column]
    private int $repeats;

    #[ORM\OneToMany(targetEntity: Set::class, mappedBy: 'workout')]
    private Collection $sets;

    public function __construct()
    {
        $this->sets = new ArrayCollection();
    }

    public function getId(): ?int
    {   return $this->id;    }

    public function getName(): ?string
    {   return $this->name;    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getWeight(): ?int
    {   return $this->weight;    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    public function getRepeats(): ?int
    {   return $this->repeats;    }

    public function setRepeats(?int $repeats): self
    {
        $this->repeats = $repeats;
        return $this;
    }

    public function getSets(): Collection
    {
        return $this->sets;
    }
}