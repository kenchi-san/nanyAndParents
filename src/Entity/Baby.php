<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BabyRepository")
 */
class Baby
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthdate;

    /**
     * @ORM\Column(type="text")
     */
    private $informations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Nanny", inversedBy="id_baby")
     */
    private $id_nanny;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", inversedBy="id_baby")
     */
    private $id_parents;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getInformations(): ?string
    {
        return $this->informations;
    }

    public function setInformations(string $informations): self
    {
        $this->informations = $informations;

        return $this;
    }

    public function getIdNanny(): ?Nanny
    {
        return $this->id_nanny;
    }

    public function setIdNanny(?Nanny $id_nanny): self
    {
        $this->id_nanny = $id_nanny;

        return $this;
    }

    public function getIdParents(): ?Paren
    {
        return $this->id_parents;
    }

    public function setIdParents(?Paren $id_parents): self
    {
        $this->id_parents = $id_parents;

        return $this;
    }
}
