<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Home URL to the store you want to connect to here
    |--------------------------------------------------------------------------
    */
    'store_url' => env('WC_STORE_URL', 'https://www.laextranatural.com/'),

    /*
    |--------------------------------------------------------------------------
    | Consumer Key
    |--------------------------------------------------------------------------
    */
    'consumer_key' => env('WC_CONSUMER_KEY', 'ck_64d2e72e8d9120a9f985c1cb4073ff6bfa3b62da'),

    /*
    |--------------------------------------------------------------------------
    | Consumer Secret
    |--------------------------------------------------------------------------
    */
    'consumer_secret' => env('WC_CONSUMER_SECRET', 'cs_ed1170ce21aef204e5db9cdc603f7918734aca7f'),

    /*
    |--------------------------------------------------------------------------
    | SSL support
    |--------------------------------------------------------------------------
    */
    'verify_ssl' => env('WC_VERIFY_SSL', false),

    /*
    |--------------------------------------------------------------------------
    | API version
    |--------------------------------------------------------------------------
    */
    'api_version' => env('WC_VERSION', 'v2'),

    /*
    |--------------------------------------------------------------------------
    | WP API usage
    |--------------------------------------------------------------------------
    */
    'wp_api' => env('WC_WP_API', true),

    /*
    |--------------------------------------------------------------------------
    | Force Basic Authentication as query string
    |--------------------------------------------------------------------------
    */
    'query_string_auth' => env('WC_WP_QUERY_STRING_AUTH', false),

    /*
    |--------------------------------------------------------------------------
    | WP timeout
    |--------------------------------------------------------------------------
    */
    'timeout' => env('WC_WP_TIMEOUT', 15),
];
