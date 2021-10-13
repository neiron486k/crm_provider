<?php

declare(strict_types=1);

namespace App\Service\Sender;

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractSender implements SenderInterface
{
    protected array $config;

    protected HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function setConfig(array $config): void
    {
        if (!$this->checkConfig($config)) {
            throw new InvalidConfigurationException('Invalid config for ' . $this->getTag());
        }

        $this->config = $config;
    }

    public abstract function checkConfig(array $config): bool;
}