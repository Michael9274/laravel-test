<?php

use Illuminate\Support\Facades\Route;

Route::middleware('log')->group(function () {
    Route::post('/webhook/super-walletz', [\App\Http\Controllers\WebhookController::class, 'superWalletz']);
});
