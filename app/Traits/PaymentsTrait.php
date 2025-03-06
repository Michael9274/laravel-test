<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

trait PaymentsTrait
{
    protected  function  setResponseByResponseApi($responseApi): RedirectResponse
    {
        if ($responseApi->successful()) {
            return back()->with([
                'success' =>  true,
                'transaction_id' => $responseApi->json('transaction_id')
            ]);
        }

        return back()->withErrors([
            'message' => $responseApi->json('message') ??  $responseApi->body()
        ]);
    }
}
