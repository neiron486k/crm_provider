<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\CrmManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class GetSendersCommand extends Command
{
    protected static $defaultName = 'app:crm-get-senders';

    private CrmManager $crmManager;

    public function __construct(CrmManager $crmManager)
    {
        parent::__construct();
        $this->crmManager = $crmManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $config = [
            'foo' => [
                'url' => 'http://localhost'
            ],
            'bar' => [],
            'baz' => [
                'token' => 'token'
            ]
        ];

        $senders = $this->crmManager->getSenders($config);
        $io = new SymfonyStyle($input, $output);

        $io->title('Received senders:');

        foreach ($senders as $sender) {
            $io->text($sender->getTag());
        }

        return Command::SUCCESS;
    }
}