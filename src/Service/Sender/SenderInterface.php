<?php

declare(strict_types=1);

namespace App\Service\Sender;

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

interface SenderInterface
{
    public function getTag(): string;

    public function checkConfig(array $config): bool;

    /**
     * @throws InvalidConfigurationException
     */
    public function setConfig(array $config): void;
}