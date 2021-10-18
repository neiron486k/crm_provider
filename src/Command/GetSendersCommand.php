<?php

declare(strict_types=1);

namespace App\Command;

use App\Dto\LeadDto;
use App\Message\LeadSentNotification;
use App\Service\CrmService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

final class GetSendersCommand extends Command
{
    protected static $defaultName = 'app:crm-get-senders';

    private CrmService $crmService;

    public function __construct(CrmService $crmService)
    {
        parent::__construct();
        $this->crmService = $crmService;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $leadDto = new LeadDto();
        $senders = $this->crmService->getSenders($leadDto);
        $io = new SymfonyStyle($input, $output);

        $io->title('Received senders:');

        foreach ($senders as $sender) {
            $io->text($sender->getTag());
        }

        return Command::SUCCESS;
    }
}