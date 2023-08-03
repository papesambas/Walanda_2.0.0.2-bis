<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\EcoleProvenancesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: EcoleProvenancesRepository::class)]
#[UniqueEntity(fields: ['designation'], message: 'There is already an account with this designation')]
class EcoleProvenances
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $designation = null;

    #[ORM\OneToMany(mappedBy: 'ecoleAnDernier', targetEntity: Eleves::class)]
    private Collection $elevesTransfert;

    #[ORM\OneToMany(mappedBy: 'ecoleRecrutement', targetEntity: Eleves::class)]
    private Collection $eleves;

    public function __construct()
    {
        $this->elevesTransfert = new ArrayCollection();
        $this->eleves = new ArrayCollection();
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
     * @return Collection<int, Eleves>
     */
    public function getElevesTransfert(): Collection
    {
        return $this->elevesTransfert;
    }

    public function addElevesTransfert(Eleves $elevesTransfert): static
    {
        if (!$this->elevesTransfert->contains($elevesTransfert)) {
            $this->elevesTransfert->add($elevesTransfert);
            $elevesTransfert->setEcoleAnDernier($this);
        }

        return $this;
    }

    public function removeElevesTransfert(Eleves $elevesTransfert): static
    {
        if ($this->elevesTransfert->removeElement($elevesTransfert)) {
            // set the owning side to null (unless already changed)
            if ($elevesTransfert->getEcoleAnDernier() === $this) {
                $elevesTransfert->setEcoleAnDernier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Eleves>
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleves $elefe): static
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves->add($elefe);
            $elefe->setEcoleRecrutement($this);
        }

        return $this;
    }

    public function removeElefe(Eleves $elefe): static
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getEcoleRecrutement() === $this) {
                $elefe->setEcoleRecrutement(null);
            }
        }

        return $this;
    }
}
