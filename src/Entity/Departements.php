<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\DepartementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: DepartementsRepository::class)]
#[UniqueEntity(fields: ['designation'], message: 'There is already an account with this designation')]
class Departements
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150, unique: true)]
    private ?string $designation = null;

    /**
     * il avoir des départements  dont le niveau peut être null
     *
     * @var Collection|null
     */
    #[ORM\ManyToMany(targetEntity: Niveaux::class, inversedBy: 'departements')]
    private Collection $niveau;

    public function __construct()
    {
        $this->niveau = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->designation;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * @return Collection<int, Niveaux>
     */
    public function getNiveau(): Collection
    {
        return $this->niveau;
    }

    public function addNiveau(Niveaux $niveau): static
    {
        if (!$this->niveau->contains($niveau)) {
            $this->niveau->add($niveau);
        }

        return $this;
    }

    public function removeNiveau(Niveaux $niveau): static
    {
        $this->niveau->removeElement($niveau);

        return $this;
    }
}
