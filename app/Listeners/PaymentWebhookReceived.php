<?php

namespace App\Listeners;

use App\Events\PaymentWebhookReceivedEvent;
use App\Traits\LogTrait;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaymentWebhookReceived
{
    use LogTrait;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentWebhookReceivedEvent $event): void
    {
        $this->logWebhook($event->provider, $event->payload);
    }
}
