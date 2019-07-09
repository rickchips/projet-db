<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
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
    private $nomCategorie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnage", mappedBy="nomCategorie")
     */
    private $nomPerso;

    public function __construct()
    {
        $this->nomPerso = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nomCategorie;
    }

    public function setNomCategorie(string $nomCategorie): self
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }
    public function __toString()
    {
        return $this->nomCategorie;
    }

    /**
     * @return Collection|Personnage[]
     */
    public function getNomPerso(): Collection
    {
        return $this->nomPerso;
    }

    public function addNomPerso(Personnage $nomPerso): self
    {
        if (!$this->nomPerso->contains($nomPerso)) {
            $this->nomPerso[] = $nomPerso;
            $nomPerso->addNomCategorie($this);
        }

        return $this;
    }

    public function removeNomPerso(Personnage $nomPerso): self
    {
        if ($this->nomPerso->contains($nomPerso)) {
            $this->nomPerso->removeElement($nomPerso);
            $nomPerso->removeNomCategorie($this);
        }

        return $this;
    }
}
