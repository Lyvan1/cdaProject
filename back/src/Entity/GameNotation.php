<?php

namespace App\Entity;

use App\Repository\GameNotationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameNotationRepository::class)]
class GameNotation
{
    #[ORM\Id]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Student $student;

    #[ORM\Id]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Game $game;

    #[ORM\Column]
    private int $notation;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt;

    public function __construct(Student $student, Game $game, int $notation)
    {
        $this->student = $student;
        $this->game = $game;
        $this->notation = $notation;

        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = null;
    }

    public function updateNotation(int $note): void
    {
        $this->notation = $note;
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function getNotation(): int
    {
        return $this->notation;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
