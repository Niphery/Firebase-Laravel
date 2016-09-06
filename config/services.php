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

    'firebase' => [
    'api_key' => 'AIzaSyAdeUIGLjwOzvyYjDgwNsC0VStm2QNVSMw',
    'auth_domain' => 'test-a1bac.firebaseapp.com',
    'database_url' => 'https://test-a1bac.firebaseio.com',
    'secret' => 'c6ZEMHWsrJJ8Bt13Q74HoY6LPp5vFae67A0WZ7G4',
    'storage_bucket' => 'test-a1bac.appspot.com',
    ],

];
