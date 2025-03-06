<?php

use Illuminate\Support\Facades\Route;

Route::post('/webhook/super-walletz', [\App\Http\Controllers\WebhookController::class, 'superWalletz']);
