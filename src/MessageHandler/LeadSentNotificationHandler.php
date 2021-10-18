<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\LeadSentNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class LeadSentNotificationHandler implements MessageHandlerInterface
{
    public function __invoke(LeadSentNotification $notification)
    {
        $test = "123";
    }
}