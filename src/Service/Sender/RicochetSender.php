<?php

declare(strict_types=1);

namespace App\Service\Sender;

final class RicochetSender implements SenderInterface
{
    public const TAG = 'ricochet';

    public function getTag(): string
    {
        return self::TAG;
    }
}