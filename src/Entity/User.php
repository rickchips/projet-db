<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64, unique=true)
     */
    private $pseudoUser;

    /**
     * @ORM\Column(type="string", length=64, unique=true)
     */
    private $emailUser;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $mdpUser;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnage", inversedBy="pseudo_user")
     */
    private $idPerso;

    public function __construct()
    {
        $this->idPerso = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudoUser(): ?string
    {
        return $this->pseudoUser;
    }

    public function setPseudoUser(string $pseudoUser): self
    {
        $this->pseudoUser = $pseudoUser;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->emailUser;
    }

    public function setEmailUser(string $emailUser): self
    {
        $this->emailUser = $emailUser;

        return $this;
    }

    public function getMdpUser(): ?string
    {
        return $this->mdpUser;
    }

    public function setMdpUser(string $mdpUser): self
    {
        $this->mdpUser = $mdpUser;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection|Personnage[]
     */
    public function getIdPerso(): Collection
    {
        return $this->idPerso;
    }

    public function addIdPerso(Personnage $idPerso): self
    {
        if (!$this->idPerso->contains($idPerso)) {
            $this->idPerso[] = $idPerso;
        }

        return $this;
    }

    public function removeIdPerso(Personnage $idPerso): self
    {
        if ($this->idPerso->contains($idPerso)) {
            $this->idPerso->removeElement($idPerso);
        }

        return $this;
    }
}
