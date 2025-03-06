<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Interfaces\PaymentInterface;
use App\Models\Payment;
use App\Services\Payment\EasyMoneyService;
use App\Services\Payment\SuperWalletzService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    public  function  deposit(PaymentRequest $request): RedirectResponse
    {
        $provider = $request->input('pay-method');

        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $service = $provider === 'easymoney'
            ? new EasyMoneyService()
            : new SuperWalletzService();

        return $service->processPayment($amount, $currency);
    }
}
