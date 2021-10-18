<?php

declare(strict_types=1);

namespace App\Dto;

final class SubscriptionDto
{
    public function getConfig(): array
    {
        return [
            'foo' => [
                'url' => 'http://localhost'
            ],
            'bar' => [],
            'baz' => [
                'token' => 'token'
            ]
        ];
    }

    public function getAlias(): string
    {
        return 'alias-asdfx103c';
    }
}