<?php

use Illuminate\Support\Facades\Route;

Route::middleware('log')->group(function () {
    Route::view('/', 'welcome');
    Route::post('/deposit', [\App\Http\Controllers\PaymentController::class, 'deposit']);
});
