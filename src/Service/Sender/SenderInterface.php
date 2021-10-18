<?php

declare(strict_types=1);

namespace App\Service\Sender;

interface SenderInterface
{
    public function getTag(): string;
}