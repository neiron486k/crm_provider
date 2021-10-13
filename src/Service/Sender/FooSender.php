<?php

declare(strict_types=1);

namespace App\Service\Sender;

final class FooSender extends AbstractSender
{
    public function getTag(): string
    {
        return 'foo';
    }

    public function checkConfig(array $config): bool
    {
        return isset($config['url']);
    }
}