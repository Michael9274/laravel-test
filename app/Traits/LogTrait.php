<?php

namespace App\Traits;

use App\Models\PaymentLog;
use App\Models\RequestLog;
use App\Models\WebhookLog;

trait LogTrait
{
    protected  function  paymentLog(string $provider, $requestBody, $response): void
    {
        PaymentLog::create([
            'provider' => $provider,
            'request_body' => json_encode($requestBody),
            'response_body' => json_encode($response->json()),
            'status_code' => $response->status(),
        ]);
    }

    public function logWebhook(string $provider, array $payload): void
    {
        WebhookLog::create([
            'provider' => $provider,
            'payload' => json_encode($payload),
        ]);
    }

    public function logRequest(string $url, array $payload): void
    {
        RequestLog::create([
            'url' => $url,
            'payload' => json_encode($payload),
        ]);
    }
}
