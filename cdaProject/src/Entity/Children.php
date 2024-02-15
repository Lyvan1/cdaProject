<?php

namespace App\Entity;

use App\Repository\ChildrenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChildrenRepository::class)]
class Children extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 10)]
    private string $level;

    #[ORM\ManyToOne(inversedBy: 'childrens')]
    #[ORM\JoinColumn(nullable: false)]
    private Tutor $tutor;

    public function __construct(
        string $level,
        string $username,
        string $firstname,
        string $lastname,
        Tutor $tutor,
        \DateTimeInterface $birthdate
    )
    {
        $this->level = $level;
        $this->tutor = $tutor;

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

    public function getLevel(): string
    {
        return $this->level;
    }

    public function getTutor(): ?Tutor
    {
        return $this->tutor;
    }
}
