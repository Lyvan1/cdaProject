<?php

namespace App\Entity;

use App\Repository\TutorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TutorRepository::class)]
class Tutor extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private int $phoneNumber;

    #[ORM\Column(length: 100)]
    private string $email;

    #[ORM\OneToMany(targetEntity: Children::class, mappedBy: 'tutor', orphanRemoval: true)]
    private Collection $childrens;

    public function __construct(
        int $phoneNumber,
        string $email,
        string $username,
        string $firstname,
        string $lastname,
        \DateTimeInterface $birthdate
    )
    {
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;

        parent::__construct(
            $username,
            $firstname,
            $lastname,
            $birthdate
        );
        $this->childrens = new ArrayCollection();
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getChildrens(): Collection
    {
        return $this->childrens;
    }

    public function addChildren(Children $children): static
    {
        if (!$this->childrens->contains($children)) {
            $this->childrens->add($children);
            $children->setTutor($this);
        }

        return $this;
    }

    public function removeChildren(Children $children): static
    {
        if ($this->childrens->removeElement($children)) {
            // set the owning side to null (unless already changed)
            if ($children->getTutor() === $this) {
                $children->setTutor(null);
            }
        }

        return $this;
    }
}
