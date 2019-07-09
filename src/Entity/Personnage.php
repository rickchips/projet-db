<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnageRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Personnage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $nomPerso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aptLeaderPerso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aptPassPerso;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreationPerso;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModifPerso;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="idPerso")
     */
    private $pseudoUser;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Liens", inversedBy="nomPerso")
     */
    private $nomLiens;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Categorie", inversedBy="nomPerso")
     */
    private $nomCategorie;

    public function __construct()
    {
        $this->pseudoUser = new ArrayCollection();
        $this->nomLiens = new ArrayCollection();
        $this->nomCategorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPerso(): ?string
    {
        return $this->nomPerso;
    }

    public function setNomPerso(string $nomPerso): self
    {
        $this->nomPerso = $nomPerso;

        return $this;
    }

    public function getAptLeaderPerso(): ?string
    {
        return $this->aptLeaderPerso;
    }

    public function setAptLeaderPerso(?string $aptLeaderPerso): self
    {
        $this->aptLeaderPerso = $aptLeaderPerso;

        return $this;
    }

    public function getAptPassPerso(): ?string
    {
        return $this->aptPassPerso;
    }

    public function setAptPassPerso(?string $aptPassPerso): self
    {
        $this->aptPassPerso = $aptPassPerso;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDateCreationPerso(): ?\DateTimeInterface
    {
        return $this->dateCreationPerso;
    }

    public function setDateCreationPerso(\DateTimeInterface $dateCreationPerso): self
    {
        $this->dateCreationPerso = $dateCreationPerso;

        return $this;
    }

    public function getDateModifPerso(): ?\DateTimeInterface
    {
        return $this->dateModifPerso;
    }

    public function setDateModifPerso(?\DateTimeInterface $dateModifPerso): self
    {
        $this->dateModifPerso = $dateModifPerso;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getPseudoUser(): Collection
    {
        return $this->pseudoUser;
    }

    public function addPseudoUser(User $pseudoUser): self
    {
        if (!$this->pseudoUser->contains($pseudoUser)) {
            $this->pseudoUser[] = $pseudoUser;
            $pseudoUser->addIdPerso($this);
        }

        return $this;
    }

    public function removePseudoUser(User $pseudoUser): self
    {
        if ($this->pseudoUser->contains($pseudoUser)) {
            $this->pseudoUser->removeElement($pseudoUser);
            $pseudoUser->removeIdPerso($this);
        }

        return $this;
    }

    /**
     * @return Collection|Liens[]
     */
    public function getNomLiens(): Collection
    {
        return $this->nomLiens;
    }

    public function addNomLien(Liens $nomLien): self
    {
        if (!$this->nomLiens->contains($nomLien)) {
            $this->nomLiens[] = $nomLien;
        }

        return $this;
    }

    public function removeNomLien(Liens $nomLien): self
    {
        if ($this->nomLiens->contains($nomLien)) {
            $this->nomLiens->removeElement($nomLien);
        }

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getNomCategorie(): Collection
    {
        return $this->nomCategorie;
    }

    public function addNomCategorie(Categorie $nomCategorie): self
    {
        if (!$this->nomCategorie->contains($nomCategorie)) {
            $this->nomCategorie[] = $nomCategorie;
        }

        return $this;
    }

    public function removeNomCategorie(Categorie $nomCategorie): self
    {
        if ($this->nomCategorie->contains($nomCategorie)) {
            $this->nomCategorie->removeElement($nomCategorie);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nomPerso;
    }

    /**
     * @ORM\PreUpdate()
     */
    public function refreshUpdateAt()
    {
        $this->dateModifPerso = new \DateTime();
    }

    /**
     * @ORM\PrePersist()
     */
    public function initCreatedAt()
    {
        $this->dateCreationPerso = new \DateTime();
    }


    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->dateModifPerso = new \DateTime('now');
        }
    }
    /**
     * @return File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }




}
