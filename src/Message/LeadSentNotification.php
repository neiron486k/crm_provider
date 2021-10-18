<?php

declare(strict_types=1);

namespace App\Message;

final class LeadSentNotification
{
    private $lead;

    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    public function getLead()
    {
        return $this->lead;
    }
}