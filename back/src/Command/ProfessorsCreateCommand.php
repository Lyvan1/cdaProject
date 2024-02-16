<?php

namespace App\Command;

use App\Entity\Professor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:professors:create',
    description: 'Add a short description for your command',
)]
class ProfessorsCreateCommand extends Command
{
    private UserPasswordHasherInterface $passwordHasher;
    private EntityManagerInterface $entityManager;

    public function __construct(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager)
    {
        $this->passwordHasher = $passwordHasher;
        $this->entityManager = $entityManager;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $username = $io->ask('Entrez votre username:');
        $password = $io->ask('Entrez votre password');


        $birthdate = new \DateTimeImmutable();


        $professor = new Professor('1234567890123','012345678', 'usertest@dev.com', $username, 'test', 'user', $birthdate);
        $professor->setPassword($this->passwordHasher->hashPassword($professor, $password));
        $this->entityManager->persist($professor);
        $this->entityManager->flush();

        $io->success('Professor has been created');
        return Command::SUCCESS;

    }
}
