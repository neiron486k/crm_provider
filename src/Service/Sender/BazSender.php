<?php

declare(strict_types=1);

namespace App\Service\Sender;

final class BazSender extends AbstractSender
{
    public function getTag(): string
    {
        return 'baz';
    }

    public function checkConfig(array $config): bool
    {
        return isset($config['token']);
    }
}