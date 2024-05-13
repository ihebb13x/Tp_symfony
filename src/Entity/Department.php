<?php

namespace App\Entity;
use App\Entity\Salle;
use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartmentRepository::class)]
class Department
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $code = null;

    /**
     * @var Collection<int, Salle>
     */
    #[ORM\OneToMany(targetEntity: Salle::class, mappedBy: 'department')]
    private Collection $avoir;

    /**
     * @var Collection<int, Salle>
     */
    #[ORM\OneToMany(targetEntity: Salle::class, mappedBy: 'appartient')]
    private Collection $salles;

    public function __construct()
    {
        $this->avoir = new ArrayCollection();
        $this->salles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): static
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection<int, salle>
     */
    public function getAvoir(): Collection
    {
        return $this->avoir;
    }

    public function addAvoir(salle $avoir): static
    {
        if (!$this->avoir->contains($avoir)) {
            $this->avoir->add($avoir);
            $avoir->setDepartment($this);
        }

        return $this;
    }

    public function removeAvoir(salle $avoir): static
    {
        if ($this->avoir->removeElement($avoir)) {
            // set the owning side to null (unless already changed)
            if ($avoir->getDepartment() === $this) {
                $avoir->setDepartment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Salle>
     */
    public function getSalles(): Collection
    {
        return $this->salles;
    }

    public function addSalle(Salle $salle): static
    {
        if (!$this->salles->contains($salle)) {
            $this->salles->add($salle);
            $salle->setAppartient($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): static
    {
        if ($this->salles->removeElement($salle)) {
            // set the owning side to null (unless already changed)
            if ($salle->getAppartient() === $this) {
                $salle->setAppartient(null);
            }
        }

        return $this;
    }
}
