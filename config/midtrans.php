<?php

return [
    // Midtrans server key for API authentication
    'server_key' => env('MIDTRANS_SERVER_KEY', ''),

    // Set to true for production environment
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),

    'is_3ds' => env('MIDTRANS_IS_3DS', true)
];
