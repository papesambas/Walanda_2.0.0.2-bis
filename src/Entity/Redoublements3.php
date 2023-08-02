<?php

namespace App\Entity;

use App\Repository\Redoublements3Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Redoublements3Repository::class)]
class Redoublements3
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'redoublements3s')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Niveaux $niveau = null;

    #[ORM\ManyToOne(inversedBy: 'redoublements3s')]
    private ?Scolarites1 $scolarite1 = null;

    #[ORM\ManyToOne(inversedBy: 'redoublements3s')]
    private ?Scolarites2 $scolarite2 = null;

    #[ORM\ManyToOne(inversedBy: 'redoublements3s')]
    private ?Scolarites3 $scolarite3 = null;

    #[ORM\ManyToOne(inversedBy: 'redoublements3s')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Redoublements2 $redoublement2 = null;


    public function __toString()
    {
        return $this->niveau->getDesignation();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?Niveaux
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveaux $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getScolarite1(): ?Scolarites1
    {
        return $this->scolarite1;
    }

    public function setScolarite1(?Scolarites1 $scolarite1): static
    {
        $this->scolarite1 = $scolarite1;

        return $this;
    }

    public function getScolarite2(): ?Scolarites2
    {
        return $this->scolarite2;
    }

    public function setScolarite2(?Scolarites2 $scolarite2): static
    {
        $this->scolarite2 = $scolarite2;

        return $this;
    }

    public function getScolarite3(): ?Scolarites3
    {
        return $this->scolarite3;
    }

    public function setScolarite3(?Scolarites3 $scolarite3): static
    {
        $this->scolarite3 = $scolarite3;

        return $this;
    }

    public function getRedoublement2(): ?Redoublements2
    {
        return $this->redoublement2;
    }

    public function setRedoublement2(?Redoublements2 $redoublement2): static
    {
        $this->redoublement2 = $redoublement2;

        return $this;
    }
}
