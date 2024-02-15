<?php

namespace App\Entity;

use App\Repository\ProfessorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessorRepository::class)]
class Professor extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 13)]
    private string $numen;

    #[ORM\Column]
    private int $phoneNumber;

    #[ORM\Column(length: 100)]
    private string $email;

    public function __construct(
        string $numen,
        int $phoneNumber,
        string $email,
        string $username,
        string $firstname,
        string $lastname,
        \DateTimeInterface $birthdate
    )
    {
        $this->numen = $numen;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;

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

    public function getNumen(): string
    {
        return $this->numen;
    }

    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
