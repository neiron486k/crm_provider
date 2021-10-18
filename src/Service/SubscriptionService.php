<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\SubscriptionDto;

final class SubscriptionService
{
    public function getSubscriptionByAlias(string $alias): SubscriptionDto
    {
        return new SubscriptionDto();
    }
}