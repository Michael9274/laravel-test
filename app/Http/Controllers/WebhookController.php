<?php

namespace App\Http\Controllers;

use App\Events\PaymentWebhookReceivedEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function superWalletz(Request $request): JsonResponse
    {
        $payload = $request->all();
        event(new PaymentWebhookReceivedEvent('super_walletz', $payload));
        return response()->json(['status' => 'success']);
    }
}
