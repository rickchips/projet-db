<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LiensRepository")
 */
class Liens
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
    private $nomLiens;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbKiLiens;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnage", mappedBy="nomLiens")
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

    public function getNomLiens(): ?string
    {
        return $this->nomLiens;
    }

    public function setNomLiens(string $nomLiens): self
    {
        $this->nomLiens = $nomLiens;

        return $this;
    }

    public function getNbKiLiens(): ?int
    {
        return $this->nbKiLiens;
    }

    public function setNbKiLiens(int $nbKiLiens): self
    {
        $this->nbKiLiens = $nbKiLiens;

        return $this;
    }

    public function __toString()
    {
        return $this->nomLiens;
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
            $nomPerso->addNomLien($this);
        }

        return $this;
    }

    public function removeNomPerso(Personnage $nomPerso): self
    {
        if ($this->nomPerso->contains($nomPerso)) {
            $this->nomPerso->removeElement($nomPerso);
            $nomPerso->removeNomLien($this);
        }

        return $this;
    }
}
