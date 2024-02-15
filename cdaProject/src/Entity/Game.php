<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    public const TYPE_QUIZ = 'quiz';
    public const TYPE_QCM = 'qcm';

    private const AVAILABLE_TYPES = [
        self::TYPE_QUIZ,
        self::TYPE_QCM
    ];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 100)]
    private string $title;

    #[ORM\Column(length: 255)]
    private string $description;

    #[ORM\Column(length: 255)]
    private string $rules;

    #[ORM\Column(length: 100)]
    private string $type;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    private Course $course;

    public function __construct(
        string $title,
        string $description,
        string $rules,
        string $type,
        Course $course
    )
    {
        if (false === in_array($type, self::AVAILABLE_TYPES)) {
            throw new \DomainException(sprintf('invalid type "%s"', $type));
        }

        $this->title = $title;
        $this->description = $description;
        $this->rules = $rules;
        $this->type = $type;
        $this->course = $course;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getRules(): string
    {
        return $this->rules;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCourse(): Course
    {
        return $this->course;
    }
}
