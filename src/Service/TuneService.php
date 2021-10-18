<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\TuneDto;
use Symfony\Component\HttpFoundation\Response;

final class TuneService
{
    public function send(TuneDto $dto): int
    {
        return Response::HTTP_OK;
    }
}