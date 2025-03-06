<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::post('/deposit', [\App\Http\Controllers\PaymentController::class, 'deposit']);
