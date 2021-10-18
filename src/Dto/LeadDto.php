<?php

declare(strict_types=1);

namespace App\Dto;

final class LeadDto
{
    public function getAlias(): string
    {
        return 'alias';
    }

    public function isAppointment(): bool
    {
        return true;
    }
}