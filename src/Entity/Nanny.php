<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NannyRepository")
 */
class Nanny
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $dayPrice;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $mealPrice;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $snackPrice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Parents", mappedBy="id_nanny")
     */
    private $id_parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Baby", mappedBy="id_nanny")
     */
    private $id_baby;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="id_message_nanny")
     */
    private $id_message;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $csrf_token;

    public function __construct()
    {
        $this->id_parent = new ArrayCollection();
        $this->id_baby = new ArrayCollection();
        $this->id_message = new ArrayCollection();
    }



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

    public function getDayPrice(): ?float
    {
        return $this->dayPrice;
    }

    public function setDayPrice(?float $dayPrice): self
    {
        $this->dayPrice = $dayPrice;

        return $this;
    }

    public function getMealPrice(): ?float
    {
        return $this->mealPrice;
    }

    public function setMealPrice(?float $mealPrice): self
    {
        $this->mealPrice = $mealPrice;

        return $this;
    }

    public function getSnackPrice(): ?float
    {
        return $this->snackPrice;
    }

    public function setSnackPrice(?float $snackPrice): self
    {
        $this->snackPrice = $snackPrice;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|Paren[]
     */
    public function getIdParent(): Collection
    {
        return $this->id_parent;
    }

    public function addIdParent(Paren $idParent): self
    {
        if (!$this->id_parent->contains($idParent)) {
            $this->id_parent[] = $idParent;
            $idParent->setIdNanny($this);
        }

        return $this;
    }

    public function removeIdParent(Paren $idParent): self
    {
        if ($this->id_parent->contains($idParent)) {
            $this->id_parent->removeElement($idParent);
            // set the owning side to null (unless already changed)
            if ($idParent->getIdNanny() === $this) {
                $idParent->setIdNanny(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Baby[]
     */
    public function getIdBaby(): Collection
    {
        return $this->id_baby;
    }

    public function addIdBaby(Baby $idBaby): self
    {
        if (!$this->id_baby->contains($idBaby)) {
            $this->id_baby[] = $idBaby;
            $idBaby->setIdNanny($this);
        }

        return $this;
    }

    public function removeIdBaby(Baby $idBaby): self
    {
        if ($this->id_baby->contains($idBaby)) {
            $this->id_baby->removeElement($idBaby);
            // set the owning side to null (unless already changed)
            if ($idBaby->getIdNanny() === $this) {
                $idBaby->setIdNanny(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getIdMessage(): Collection
    {
        return $this->id_message;
    }

    public function addIdMessage(Message $idMessage): self
    {
        if (!$this->id_message->contains($idMessage)) {
            $this->id_message[] = $idMessage;
            $idMessage->setIdMessageNanny($this);
        }

        return $this;
    }

    public function removeIdMessage(Message $idMessage): self
    {
        if ($this->id_message->contains($idMessage)) {
            $this->id_message->removeElement($idMessage);
            // set the owning side to null (unless already changed)
            if ($idMessage->getIdMessageNanny() === $this) {
                $idMessage->setIdMessageNanny(null);
            }
        }

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCsrfToken(): ?string
    {
        return $this->csrf_token;
    }

    public function setCsrfToken(string $csrf_token): self
    {
        $this->csrf_token = $csrf_token;

        return $this;
    }
}
