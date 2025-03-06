<?php

namespace App\Services\Payment;

use App\Interfaces\PaymentInterface;
use App\Traits\LogTrait;
use App\Traits\PaymentsTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class EasyMoneyService implements PaymentInterface
{
    use LogTrait, PaymentsTrait;

    public function processPayment(float $amount, string $currency): RedirectResponse
    {
        $url = config('payments.easy_money.url');

        $requestBody = [
            'amount' => $amount,
            'currency' => $currency,
        ];

        if (!ctype_digit((string)$amount)) {
            return redirect()->back()->withErrors(['amount' => 'With this payment method the amount cannot be decimal.'])->withInput();
        }

        $response = Http::post($url, $requestBody);

        $this->paymentLog('easy_money', $requestBody, $response);
        return $this->setResponseByResponseApi($response);
    }
}
