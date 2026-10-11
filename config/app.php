<?php

return [

    'name' => env('APP_NAME', 'Heisen Group Company Limited'),

    'env' => env('APP_ENV', 'production'),

    'debug' => (bool) env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost'),

    'timezone' => env('APP_TIMEZONE', 'Africa/Dar_es_Salaam'),

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Company profile constants (used across public views)
    |--------------------------------------------------------------------------
    */
    'company' => [
        'name' => 'HEISEN GROUP COMPANY LIMITED',
        'tagline' => 'Environmental Cleaning Services & General Supply',
        'phone_primary' => env('COMPANY_PHONE_PRIMARY', '+255 650 552 696'),
        'phone_secondary' => env('COMPANY_PHONE_SECONDARY', ''),
        'email' => env('COMPANY_EMAIL', 'heisengroup.tz@gmail.com'),
        'address' => env('COMPANY_ADDRESS', 'Bibi Titi Road, Nyerere Tower, 2nd Floor, near DIT College, Dar es Salaam, Tanzania'),
        'facebook' => env('COMPANY_FACEBOOK', 'Heisen_group'),
        'instagram' => env('COMPANY_INSTAGRAM', 'Heisen_group'),
        'registrations' => ['TRA', 'OSHA', 'BRELA'],
        'license' => 'Licensed under the NEST system to operate in Tanzania',
    ],

];
