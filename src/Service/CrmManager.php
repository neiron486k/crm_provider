<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\Sender\SenderInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

final class CrmManager
{
    private iterable $senders;

    private LoggerInterface $logger;

    public function __construct(iterable $senders, LoggerInterface $logger)
    {
        $this->senders = $senders;
        $this->logger = $logger;
    }

    /**
     * @return SenderInterface[]
     */
    public function getSenders(array $config): array
    {
        $senders = [];

        foreach ($this->senders as $sender) {
            if ($sender instanceof SenderInterface) {
                if (isset($config[$sender->getTag()])) {
                    try {
                        $sender->setConfig($config[$sender->getTag()]);
                        $senders[] = $sender;
                    } catch (InvalidConfigurationException $exception) {
                        $this->logger->error($exception->getMessage(), [$exception->getMessage()]);
                    }
                }
            }
        }

        return $senders;
    }
}