<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\PeresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeresRepository::class)]
class Peres
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'peres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Noms $nom = null;

    #[ORM\ManyToOne(inversedBy: 'peres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Prenoms $prenom = null;

    #[ORM\ManyToOne(inversedBy: 'peres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Professions $profession = null;

    #[ORM\OneToMany(mappedBy: 'peres', targetEntity: Telephones::class)]
    private Collection $telephones;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fullname = null;

    #[ORM\OneToOne(inversedBy: 'peres', cascade: ['persist', 'remove'])]
    private ?Ninas $nina = null;

    #[ORM\OneToMany(mappedBy: 'pere', targetEntity: Eleves::class)]
    private Collection $enfants;

    public function __construct()
    {
        $this->telephones = new ArrayCollection();
        $this->enfants = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->fullname;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?Noms
    {
        return $this->nom;
    }

    public function setNom(?Noms $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?Prenoms
    {
        return $this->prenom;
    }

    public function setPrenom(?Prenoms $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getProfession(): ?Professions
    {
        return $this->profession;
    }

    public function setProfession(?Professions $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * @return Collection<int, Telephones>
     */
    public function getTelephones(): Collection
    {
        return $this->telephones;
    }

    public function addTelephone(Telephones $telephone): static
    {
        if (!$this->telephones->contains($telephone)) {
            $this->telephones->add($telephone);
            $telephone->setPeres($this);
        }

        return $this;
    }

    public function removeTelephone(Telephones $telephone): static
    {
        if ($this->telephones->removeElement($telephone)) {
            // set the owning side to null (unless already changed)
            if ($telephone->getPeres() === $this) {
                $telephone->setPeres(null);
            }
        }

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(?string $fullname): static
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getNina(): ?Ninas
    {
        return $this->nina;
    }

    public function setNina(?Ninas $nina): static
    {
        $this->nina = $nina;

        return $this;
    }

    /**
     * @return Collection<int, Eleves>
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(Eleves $enfant): static
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants->add($enfant);
            $enfant->setPere($this);
        }

        return $this;
    }

    public function removeEnfant(Eleves $enfant): static
    {
        if ($this->enfants->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getPere() === $this) {
                $enfant->setPere(null);
            }
        }

        return $this;
    }
}
