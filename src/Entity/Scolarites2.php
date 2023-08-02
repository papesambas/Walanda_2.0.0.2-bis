<?php

namespace App\Entity;

use App\Repository\Scolarites2Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Scolarites2Repository::class)]
class Scolarites2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $scolarite = null;

    #[ORM\ManyToOne(inversedBy: 'scolarites2s')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Niveaux $niveau = null;

    #[ORM\ManyToOne(inversedBy: 'scolarites2s')]
    private ?Scolarites1 $scolarite1 = null;

    #[ORM\OneToMany(mappedBy: 'scolarite2', targetEntity: Redoublements1::class)]
    private Collection $redoublements1s;

    #[ORM\OneToMany(mappedBy: 'scolarite2', targetEntity: Redoublements2::class)]
    private Collection $redoublements2s;

    #[ORM\OneToMany(mappedBy: 'scolarite2', targetEntity: Redoublements3::class)]
    private Collection $redoublements3s;

    public function __construct()
    {
        $this->redoublements1s = new ArrayCollection();
        $this->redoublements2s = new ArrayCollection();
        $this->redoublements3s = new ArrayCollection();
    }

    public function __toString()
    {
        return strval($this->scolarite);
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScolarite(): ?int
    {
        return $this->scolarite;
    }

    public function setScolarite(?int $scolarite): static
    {
        $this->scolarite = $scolarite;

        return $this;
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

    /**
     * @return Collection<int, Redoublements1>
     */
    public function getRedoublements1s(): Collection
    {
        return $this->redoublements1s;
    }

    public function addRedoublements1(Redoublements1 $redoublements1): static
    {
        if (!$this->redoublements1s->contains($redoublements1)) {
            $this->redoublements1s->add($redoublements1);
            $redoublements1->setScolarite2($this);
        }

        return $this;
    }

    public function removeRedoublements1(Redoublements1 $redoublements1): static
    {
        if ($this->redoublements1s->removeElement($redoublements1)) {
            // set the owning side to null (unless already changed)
            if ($redoublements1->getScolarite2() === $this) {
                $redoublements1->setScolarite2(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Redoublements2>
     */
    public function getRedoublements2s(): Collection
    {
        return $this->redoublements2s;
    }

    public function addRedoublements2(Redoublements2 $redoublements2): static
    {
        if (!$this->redoublements2s->contains($redoublements2)) {
            $this->redoublements2s->add($redoublements2);
            $redoublements2->setScolarite2($this);
        }

        return $this;
    }

    public function removeRedoublements2(Redoublements2 $redoublements2): static
    {
        if ($this->redoublements2s->removeElement($redoublements2)) {
            // set the owning side to null (unless already changed)
            if ($redoublements2->getScolarite2() === $this) {
                $redoublements2->setScolarite2(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Redoublements3>
     */
    public function getRedoublements3s(): Collection
    {
        return $this->redoublements3s;
    }

    public function addRedoublements3(Redoublements3 $redoublements3): static
    {
        if (!$this->redoublements3s->contains($redoublements3)) {
            $this->redoublements3s->add($redoublements3);
            $redoublements3->setScolarite2($this);
        }

        return $this;
    }

    public function removeRedoublements3(Redoublements3 $redoublements3): static
    {
        if ($this->redoublements3s->removeElement($redoublements3)) {
            // set the owning side to null (unless already changed)
            if ($redoublements3->getScolarite2() === $this) {
                $redoublements3->setScolarite2(null);
            }
        }

        return $this;
    }
}
