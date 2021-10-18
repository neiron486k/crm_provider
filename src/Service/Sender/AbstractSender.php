<?php

declare(strict_types=1);

namespace App\Service\Sender;

use App\Exception\InvalidConfigException;

abstract class AbstractSender implements ConfigurableSenderInterface
{
    protected array $config;

    /**
     * @throws InvalidConfigException
     */
    final public function setConfig(array $config): void
    {
        if (!$this->checkConfig($config)) {
            throw new InvalidConfigException('Invalid config for ' . $this->getTag());
        }

        $this->config = $config;
    }

    public abstract function checkConfig(array $config): bool;
}