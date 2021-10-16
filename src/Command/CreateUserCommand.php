<?php

namespace App\Command;

use App\Service\UserManagerService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create:user';
    protected static $defaultDescription = 'Create a new User from the Command Line';
    private UserManagerService $userManager;

    public function __construct(UserManagerService $userManager)
    {
        $this->userManager = $userManager;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setHelp('This command allows you to create a user...')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
            ->addArgument('password', InputArgument::REQUIRED, 'User password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $user = $this->userManager->new($input->getArgument('username'), $input->getArgument('password'));
        if($user->getId()) {
            $output->writeln('Username: '.$input->getArgument('username'). ' created');
            return Command::SUCCESS;
        } else {
            $output->writeln('Something went wrong');
            return Command::FAILURE;
        }

    }
}
