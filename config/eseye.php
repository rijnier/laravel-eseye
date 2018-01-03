<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ESI Application Client ID, Secret Key, and Refresh Token
    |--------------------------------------------------------------------------
    |
    | This configuration loads your ESI application client ID, secret key,
    | and refresh token from your environment configuration file. This
    | allows you to switch which ESI application Laravel uses
    | seamlessly in development and production.
    |
    */

    'client_id' => env('ESEYE_CLIENT_ID'),
    'secret_key' => env('ESEYE_SECRET_KEY'),
    'refresh_token' => env('ESEYE_REFRESH_TOKEN'),

];
