<?php

namespace App\Entity;

use App\Repository\PrivateTeacherRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrivateTeacherRepository::class)]
class PrivateTeacher extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $email;

    #[ORM\Column]
    private int $phoneNumber;

    #[ORM\Column(length: 30)]
    private string $subject;

    #[ORM\Column(length: 50)]
    private string $siret;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getSiret(): string
    {
        return $this->siret;
    }
}
