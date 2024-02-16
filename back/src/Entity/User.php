<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


#[MappedSuperclass]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Column(length: 180, unique: true)]
    private string $username;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private string $password;

    #[ORM\Column(length: 45)]
    private string $firstname;

    #[ORM\Column(length: 45)]
    private string $lastname;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private \DateTimeInterface $birthdate;


    public function __construct(
        string $username,
        string $firstname,
        string $lastname,
        \DateTimeInterface $birthdate
    )
    {
        $this->username = $username;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthdate = $birthdate;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getBirthdate(): \DateTimeInterface
    {
        return $this->birthdate;
    }
}
