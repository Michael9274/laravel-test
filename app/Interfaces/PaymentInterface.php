<?php

namespace App\Interfaces;

use Illuminate\Http\RedirectResponse;

interface PaymentInterface
{
    public function processPayment(float $amount, string $currency): RedirectResponse;
}
