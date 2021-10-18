<?php

declare(strict_types=1);

namespace App\Dto;

final class SubscriptionDto
{
    private array $config;
    private string $alias;

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