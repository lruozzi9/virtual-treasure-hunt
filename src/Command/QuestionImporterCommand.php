<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class QuestionImporterCommand extends Command
{
    protected static $defaultName = 'app:question-importer';

    protected function configure(): void
    {
        $help = <<<TEXT
Import questions from a CSV file with the following columns:
    * code (Question code)
    * question_label-* (Many columns with question label in the locale code specified with the *)
    * answer_label-* (Many columns with answer label in the locale code specified with the *)
TEXT;

        $this
            ->addArgument('csvFile', InputArgument::REQUIRED)
            ->setDescription('Import questions and answers from CSV file.')
            ->setHelp($help)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return Command::SUCCESS;
    }
}
