<?php
namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckDatabaseConnectionCommand extends Command
{
protected static $defaultName = 'app:check-db-connection';

private $entityManager;

public function __construct(EntityManagerInterface $entityManager)
{
$this->entityManager = $entityManager;
parent::__construct();
}

protected function execute(InputInterface $input, OutputInterface $output): int
{
try {
$conn = $this->entityManager->getConnection();
$conn->connect();
$output->writeln('Successfully connected to the database.');
} catch (\Exception $e) {
$output->writeln('Failed to connect to the database: ' . $e->getMessage());
return Command::FAILURE;
}

return Command::SUCCESS;
}
}
