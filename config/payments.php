<?php

return [
    'easy_money' => [
        'url' => env('EASY_MONEY_PROCESS_URL', 'http://localhost:3000/process'),
    ],
    'super_walletz' => [
        'url' => env('SUPER_WALLETZ_PAY_URL', 'http://localhost:3003/pay'),
        'callback_url' => env('SUPER_WALLETZ_CALLBACK_URL', 'http://localhost:8000/api/webhook/super-walletz'),
    ],
];
