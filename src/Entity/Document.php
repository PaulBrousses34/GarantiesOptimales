<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 */
class Document
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500, nullable=false)
     */
    private $Fichier;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $Type;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $DateTelechargement;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="Document")
     */
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function Fichier(): ?string
    {
        return $this->Fichier;
    }

    public function setFichier(?string $Fichier): self
    {
        $this->Fichier = $Fichier;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(?string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getDateTelechargement(): ?\DateTimeInterface
    {
        return $this->DateTelechargement;
    }

    public function setDateTelechargement(?\DateTimeInterface $DateTelechargement): self
    {
        $this->DateTelechargement = $DateTelechargement;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
