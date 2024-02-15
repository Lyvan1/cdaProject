<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $pdfPath;

    #[ORM\Column(length: 100)]
    private string $title;

    #[ORM\Column(length: 255)]
    private string $description;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\OneToMany(targetEntity: Game::class, mappedBy: 'course', orphanRemoval: true)]
    private Collection $games;

    public function __construct(string $pdfPath, string $title, string $description)
    {
        $this->pdfPath = $pdfPath;
        $this->title = $title;
        $this->description = $description;
        $this->createdAt = new \DateTimeImmutable();
        $this->games = new ArrayCollection();
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getPdfPath(): string
    {
        return $this->pdfPath;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): static
    {
        if (!$this->games->contains($game)) {
            $this->games->add($game);
            $game->setCourse($this);
        }

        return $this;
    }

    public function removeGame(Game $game): static
    {
        if ($this->games->removeElement($game)) {
            // set the owning side to null (unless already changed)
            if ($game->getCourse() === $this) {
                $game->setCourse(null);
            }
        }

        return $this;
    }
}
