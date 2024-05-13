<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Department; // Assurez-vous d'importer correctement l'entité Department
#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\Column]
    private ?int $capacite = null;

    #[ORM\Column]
    private ?int $etage = null;

    #[ORM\Column(length: 255)]
    private ?string $nomdepart = null;

    #[ORM\ManyToOne(inversedBy: 'avoir')]
    private ?Department $department = null;

    #[ORM\ManyToOne(inversedBy: 'salles')]
    private ?department $appartient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): static
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(int $etage): static
    {
        $this->etage = $etage;

        return $this;
    }

    public function getNomdepart(): ?string
    {
        return $this->nomdepart;
    }

    public function setNomdepart(string $nomdepart): static
    {
        $this->nomdepart = $nomdepart;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): static
    {
        $this->department = $department;

        return $this;
    }

    public function getAppartient(): ?department
    {
        return $this->appartient;
    }

    public function setAppartient(?department $appartient): static
    {
        $this->appartient = $appartient;

        return $this;
    }
}
