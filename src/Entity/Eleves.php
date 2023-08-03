<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\ElevesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity(repositoryClass: ElevesRepository::class)]
#[UniqueEntity(fields: ['matricule'], message: 'There is already an account with this matricule')]
class Eleves
{
    use CreatedAtTrait;
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $matricule = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Noms $nom = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Prenoms $prenom = null;

    #[ORM\Column(length: 8)]
    private ?string $sexe = 'Masculin';

    #[ORM\Column(length: 8)]
    private ?string $statutFinance = 'Privé(e)';

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface   $dateNaissance = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?LieuNaissances $lieuNaissance = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateExtrait = null;

    #[ORM\Column(length: 30)]
    private ?string $numExtrait = null;

    #[ORM\Column]
    private ?bool $isAdmis = false;

    #[ORM\Column]
    private ?bool $isActif = false;

    #[ORM\Column]
    private ?bool $isHandicap = false;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $natureHandicap = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateInscription = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateRecrutement = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Statuts $statut = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Departements $departement = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classes $classe = null;

    #[ORM\ManyToOne(inversedBy: 'elevesTransfert')]
    private ?EcoleProvenances $ecoleAnDernier = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?EcoleProvenances $ecoleRecrutement = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $fullname = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    private ?Scolarites1 $scolarite1 = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    private ?Scolarites2 $scolarite2 = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    private ?Scolarites3 $scolarite3 = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    private ?Redoublements1 $redoublement1 = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    private ?Redoublements2 $redoublement2 = null;

    #[ORM\ManyToOne(inversedBy: 'eleves')]
    private ?Redoublements3 $redoublement3 = null;

    #[ORM\OneToMany(mappedBy: 'eleves', targetEntity: DossierEleves::class)]
    private Collection $dossierEleves;

    #[ORM\OneToMany(mappedBy: 'eleves', targetEntity: Users::class)]
    private Collection $users;

    #[ORM\ManyToOne(inversedBy: 'enfants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Peres $pere = null;

    #[ORM\ManyToOne(inversedBy: 'enfants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Meres $mere = null;

    public function __construct()
    {
        $this->dossierEleves = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): static
    {
        $this->matricule = $matricule;

        return $this;
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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getStatutFinance(): ?string
    {
        return $this->statutFinance;
    }

    public function setStatutFinance(string $statutFinance): static
    {
        $this->statutFinance = $statutFinance;

        return $this;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?LieuNaissances
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?LieuNaissances $lieuNaissance): static
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getDateExtrait()
    {
        return $this->dateExtrait;
    }

    public function setDateExtrait($dateExtrait): self
    {
        $this->dateExtrait = $dateExtrait;

        return $this;
    }

    public function getNumExtrait(): ?string
    {
        return $this->numExtrait;
    }

    public function setNumExtrait(string $numExtrait): static
    {
        $this->numExtrait = $numExtrait;

        return $this;
    }

    public function isIsAdmis(): ?bool
    {
        return $this->isAdmis;
    }

    public function setIsAdmis(bool $isAdmis): static
    {
        $this->isAdmis = $isAdmis;

        return $this;
    }

    public function isIsActif(): ?bool
    {
        return $this->isActif;
    }

    public function setIsActif(bool $isActif): static
    {
        $this->isActif = $isActif;

        return $this;
    }

    public function isIsHandicap(): ?bool
    {
        return $this->isHandicap;
    }

    public function setIsHandicap(bool $isHandicap): static
    {
        $this->isHandicap = $isHandicap;

        return $this;
    }

    public function getNatureHandicap(): ?string
    {
        return $this->natureHandicap;
    }

    public function setNatureHandicap(?string $natureHandicap): static
    {
        $this->natureHandicap = $natureHandicap;

        return $this;
    }

    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    public function setDateInscription($dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getDateRecrutement()
    {
        return $this->dateRecrutement;
    }

    public function setDateRecrutement($dateRecrutement): self
    {
        $this->dateRecrutement = $dateRecrutement;

        return $this;
    }

    public function getStatut(): ?Statuts
    {
        return $this->statut;
    }

    public function setStatut(?Statuts $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDepartement(): ?Departements
    {
        return $this->departement;
    }

    public function setDepartement(?Departements $departement): static
    {
        $this->departement = $departement;

        return $this;
    }

    public function getClasse(): ?Classes
    {
        return $this->classe;
    }

    public function setClasse(?Classes $classe): static
    {
        $this->classe = $classe;

        return $this;
    }

    public function getEcoleAnDernier(): ?EcoleProvenances
    {
        return $this->ecoleAnDernier;
    }

    public function setEcoleAnDernier(?EcoleProvenances $ecoleAnDernier): static
    {
        $this->ecoleAnDernier = $ecoleAnDernier;

        return $this;
    }

    public function getEcoleRecrutement(): ?EcoleProvenances
    {
        return $this->ecoleRecrutement;
    }

    public function setEcoleRecrutement(?EcoleProvenances $ecoleRecrutement): static
    {
        $this->ecoleRecrutement = $ecoleRecrutement;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): static
    {
        $this->fullname = $fullname;

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

    public function getRedoublement1(): ?Redoublements1
    {
        return $this->redoublement1;
    }

    public function setRedoublement1(?Redoublements1 $redoublement1): static
    {
        $this->redoublement1 = $redoublement1;

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

    public function getRedoublement3(): ?Redoublements3
    {
        return $this->redoublement3;
    }

    public function setRedoublement3(?Redoublements3 $redoublement3): static
    {
        $this->redoublement3 = $redoublement3;

        return $this;
    }

    /**
     * @return Collection<int, DossierEleves>
     */
    public function getDossierEleves(): Collection
    {
        return $this->dossierEleves;
    }

    public function addDossierElefe(DossierEleves $dossierElefe): static
    {
        if (!$this->dossierEleves->contains($dossierElefe)) {
            $this->dossierEleves->add($dossierElefe);
            $dossierElefe->setEleves($this);
        }

        return $this;
    }

    public function removeDossierElefe(DossierEleves $dossierElefe): static
    {
        if ($this->dossierEleves->removeElement($dossierElefe)) {
            // set the owning side to null (unless already changed)
            if ($dossierElefe->getEleves() === $this) {
                $dossierElefe->setEleves(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setEleves($this);
        }

        return $this;
    }

    public function removeUser(Users $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getEleves() === $this) {
                $user->setEleves(null);
            }
        }

        return $this;
    }

    public function getPere(): ?Peres
    {
        return $this->pere;
    }

    public function setPere(?Peres $pere): static
    {
        $this->pere = $pere;

        return $this;
    }

    public function getMere(): ?Meres
    {
        return $this->mere;
    }

    public function setMere(?Meres $mere): static
    {
        $this->mere = $mere;

        return $this;
    }
}
