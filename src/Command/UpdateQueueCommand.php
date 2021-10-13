<?php

namespace App\Command;

use App\Controller\QueueController;
use App\Controller\TourFileController;
use App\Entity\TourFile;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateQueueCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:update-queue';

    /* @var QueueController $queueController */
    protected $queueController;

    /* @var TourFileController $tourFileController */
    protected $tourFileController;

    public function __construct(QueueController $queueController, EntityManagerInterface $tourFileController)
    {
        $this->queueController = $queueController;
        $this->tourFileController = $tourFileController;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to add new category in db...');
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            '<fg=green>Updating Queue</>',
            '<fg=green>==============</>',
            '',
        ]);

        $tourFiles = $this->tourFileController->getNotProcessedTourFiles();
        $this->queueController->addToQueue($tourFiles);

        $output->writeln('<fg=green>Queue successfully updated!</>');
        return Command::SUCCESS;
    }
}