<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    // google login
    'google' => [
        'client_id' => '71630544558-d7a2psbipc01l0l30j9g0k70sn3kasa7.apps.googleusercontent.com',
        'client_secret' => 'FeCjJqxd6dkP7knYdM2Yxa_0',
        'redirect' => 'http://127.0.0.1:8000/google/callback'
    ],
    // facebook login
    'facebook' => [
        'client_id' => '167145871293691',
        'client_secret' => 'b0033b9a8ba365e641ff9e7d972ef2b3',
        'redirect' => 'http://localhost:8000/facebook/callback'
    ],
    // github login
    'github' => [
        'client_id' => 'f50d0c09d98955f45468',
        'client_secret' => '1ae16a47ca06bfde242fada8634b629e93f6a3e4',
        'redirect' => 'http://127.0.0.1:8000/github/callback/github',
    ],

];
