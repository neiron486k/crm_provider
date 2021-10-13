<?php

declare(strict_types=1);

namespace App\Service\Sender;

final class BarSender extends AbstractSender
{
    public function getTag(): string
    {
        return 'bar';
    }

    public function checkConfig(array $config): bool
    {
        return isset($config['url']);
    }
}