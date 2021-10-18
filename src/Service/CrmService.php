<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\LeadDto;
use App\Exception\InvalidConfigException;
use App\Service\Sender\ConfigurableSenderInterface;
use App\Service\Sender\RicochetSender;
use App\Service\Sender\SenderInterface;
use Psr\Log\LoggerInterface;

final class CrmService
{
    /**
     * @var SenderInterface[]
     */
    private array $senders = [];

    private LoggerInterface $logger;
    private SubscriptionService $subscriptionService;

    public function __construct(
        iterable $senders,
        LoggerInterface $logger,
        SubscriptionService $subscriptionService
    ) {
        foreach ($senders as $sender) {
            $this->addSender($sender);
        }

        $this->logger = $logger;
        $this->subscriptionService = $subscriptionService;
    }

    public function send(LeadDto $leadDto): void
    {
        $senders = $this->getSenders($leadDto);
        //@todo implement logic here with queue
    }

    public function getSenders(LeadDto $leadDto): array
    {
        $subscription = $this->subscriptionService->getSubscriptionByAlias($leadDto->getAlias());
        $senders = [];

        if ($subscription) {
            $config = $subscription->getConfig();

            foreach (array_values($this->senders) as $sender) {
                if (isset($config[$sender->getTag()]) && $sender instanceof ConfigurableSenderInterface) {
                    try {
                        $sender->setConfig($config[$sender->getTag()]);
                        $senders[] = $sender;
                    } catch (InvalidConfigException $exception) {
                        $this->logger->error($exception->getMessage(), [$exception->getMessage()]);
                    }
                }
            }

            if ($this->isCompatibleForRicochet($leadDto)) {
                $senders[] = $this->getRicochetSender();
            }
        }

        return $senders;
    }

    private function addSender(SenderInterface $sender): void
    {
        $this->senders[$sender->getTag()] = $sender;
    }

    private function isCompatibleForRicochet(LeadDto $leadDto): bool
    {
        return $leadDto->isAppointment();
    }

    private function getRicochetSender(): SenderInterface
    {
        return $this->senders[RicochetSender::TAG];
    }
}