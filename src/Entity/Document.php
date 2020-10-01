<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 * @Vich\Uploadable
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
     * @var File
     * @Vich\UploadableField(mapping="document_fichier", fileNameProperty="Fichier")
     */
    private $FichierFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $Type;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @ORM\OrderBy({"DateTelechargement" = "DESC"})
     */
    private $DateTelechargement;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="Document")
     * @ORM\JoinColumn(nullable=false)
     */

    private $utilisateur;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated;

    public function __toString(){
        // to show the name of the Category in the select
        return $this->Fichier;
        // to show the id of the Category in the select
        // return $this->id;
    }
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

    /**
     * @return File|null
     */ 
    public function getFichierFile(): ?File
    {
        return $this->FichierFile;
    }

    /**
     * @param File|null $FichierFile
     */ 
    public function setFichierFile(?File $FichierFile = null)
    {
        $this->FichierFile = $FichierFile;

        if (null !== $FichierFile) {
            $this->updated = new \Datetime();
        }
    }

    /**
     * Get the value of updated
     */ 
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set the value of updated
     *
     * @return  self
     */ 
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }
}
