<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Webmozart\Assert\Assert;

final class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create-user';

    private UserPasswordHasherInterface $passwordHasher;

    private EntityManagerInterface $entityManager;

    public function __construct(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->passwordHasher = $passwordHasher;
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Create a new admin account.')
            ->setHelp('Create a new admin account by specifying email and password.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');
        $emailQuestion = new Question('Please enter the email of the user: ');
        $emailQuestion->setValidator(function ($answer) {
            if (!is_string($answer) || $answer === '') {
                throw new \RuntimeException(
                    'Please enter an email address.'
                );
            }

            return $answer;
        });
        $emailQuestion->setMaxAttempts(2);

        $passwordQuestion = new Question('Please enter the password of the user: ');
        $passwordQuestion->setValidator(function ($value) {
            if (!is_string($value) || trim($value) === '') {
                throw new \Exception('The password cannot be empty');
            }

            return $value;
        });
        $passwordQuestion->setMaxAttempts(3);
        $passwordQuestion->setHidden(true);
        $passwordQuestion->setHiddenFallback(false);

        $email = $helper->ask($input, $output, $emailQuestion);
        $password = $helper->ask($input, $output, $passwordQuestion);
        Assert::notEmpty($email);
        Assert::notEmpty($password);

        $user = new User();
        $user->setEmail($email);
        $user->setPassword($this->passwordHasher->hashPassword($user, $password));
        $user->setRoles(['ROLE_ADMIN']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return Command::SUCCESS;
    }
}
