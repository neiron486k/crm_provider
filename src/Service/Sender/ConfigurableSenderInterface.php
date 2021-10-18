<?php

declare(strict_types=1);

namespace App\Service\Sender;

use App\Exception\InvalidConfigException;

interface ConfigurableSenderInterface extends SenderInterface
{
    public function checkConfig(array $config): bool;

    /**
     * @throws InvalidConfigException
     */
    public function setConfig(array $config): void;
}