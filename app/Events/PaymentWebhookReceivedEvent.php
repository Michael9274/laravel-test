<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentWebhookReceivedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $provider;
    public mixed $payload;

    /**
     * Create a new event instance.
     */
    public function __construct($provider, $payload)
    {
        $this->provider = $provider;
        $this->payload = $payload;
    }
}
