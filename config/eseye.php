<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ESI Application Client ID, Secret Key, and Refresh Token
    |--------------------------------------------------------------------------
    |
    | This configuration loads your ESI application client ID, secret key,
    | refresh token, and datasource from your environment configuration
    | file. This allows you to switch which ESI application and
    | datasource Laravel uses in development and production.
    |
    */

    'client_id' => env('ESEYE_CLIENT_ID'),
    'secret_key' => env('ESEYE_SECRET_KEY'),
    'refresh_token' => env('ESEYE_REFRESH_TOKEN'),

    'datasource' => env('ESEYE_DATASOURCE', 'tranquility'),

    /*
    |--------------------------------------------------------------------------
    | Eseye Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may define default settings for Eseye's configuration for
    | logging and caching.
    |
    */

    'datasource' => env('ESEYE_DATASOURCE', 'tranquility'),

    'logger' => env('ESEYE_LOGGER', 'file'),
    'logger_level' => strtoupper(env('ESEYE_LOGGER_LEVEL', 'info')),
    'logfile_location' => storage_path('logs/eseye.log'),

    'cache' => env('ESEYE_CACHE', 'file'),

    'file_cache_location' => storage_path('eseye/cache'),
    
    'redis_cache_location' => env('REDIS_HOST', '127.0.0.1'),
    'redis_cache_prefix' => env('ESEYE_REDIS_PREFIX', 'eseye:'),

    'memcached_cache_host' => env('MEMCACHED_HOST', '127.0.0.1'),
    'memcached_cache_port' => env('MEMCACHED_CACHE_PORT', '11211'),
    'memcached_cache_prefix' => env('ESEYE_MEMCACHED_PREFIX', 'eseye:'),
    'memcached_cache_compressed' => false,

];
