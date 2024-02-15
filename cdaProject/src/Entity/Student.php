<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 100, nullable: true)]
    private string $email;

    #[ORM\Column(nullable: true)]
    private int $phoneNumber;

    #[ORM\ManyToOne(inversedBy: 'students')]
    private ?Classroom $classroom;

    #[ORM\Column(length: 10)]
    private string $level;

    public function __construct(
        string $email,
        int $phoneNumber,
        ?Classroom $classroom,
        string $level,
        string $username,
        string $firstname,
        string $lastname,
        \DateTimeInterface $birthdate
    )
    {
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->classroom = $classroom;
        $this->level = $level;

        parent::__construct(
            $username,
            $firstname,
            $lastname,
            $birthdate
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function getClassroom(): ?Classroom
    {
        return $this->classroom;
    }

    public function getLevel(): string
    {
        return $this->level;
    }
}
