<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '293325467849945',
        'client_secret' => 'ac6e2a68ec7af4835b8b60bfc0df2d50',
        'redirect' => 'http://localhost/Demo/public/callback/facebook',
    ],

    'twitter' => [
        'client_id' => 'jOCAGYc98KVaFEY41J1xlPFwp',
        'client_secret' => 'GzY5nfaAWasDujusClMA7RWYf2liaM3NOWJD8BdtkhnHQhjHlV',
        'redirect' => 'http://127.0.0.1/Demo/public/callback/twitter',
    ],
    'google' => [
        'client_id' => '85282109419-r3rmrpe1tkkdt2en7e73qcgfnbln1kfj.apps.googleusercontent.com',
        'client_secret' => 'zKqoiXNHb8pBjzn2rK97jCBU',
        'redirect' => 'http://localhost/Demo/public/callback/google',
    ],
];
