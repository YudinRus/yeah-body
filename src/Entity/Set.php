<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Set
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\ManyToOne(targetEntity: Workout::class, inversedBy: 'Set')]
    private Workout $workout;

    public function getId(): int { return $this->id; }

    public function getName(): string { return $this->name; }
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string { return $this->description; }
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getWorkout(): ?Workout
    {
        return $this->workout;
    }

    public function setWorkout(?Workout $workout): self
    {
        $this->workout = $workout;
        return $this;
    }
}