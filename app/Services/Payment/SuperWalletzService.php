<?php

namespace App\Services\Payment;

use App\Interfaces\PaymentInterface;
use App\Traits\LogTrait;
use App\Traits\PaymentsTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class SuperWalletzService implements PaymentInterface
{
    use LogTrait, PaymentsTrait;

    public function processPayment(float $amount, string $currency): RedirectResponse
    {
        $url = config('payments.super_walletz.url');

        $requestBody = [
            'amount' => $amount,
            'currency' => $currency,
            'callback_url' => config('payments.super_walletz.callback_url'),
        ];

        $response = Http::post($url, $requestBody);

        $this->paymentLog('super_walletz', $requestBody, $response);
        return $this->setResponseByResponseApi($response);
    }
}
