<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pack config variables
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'auth_token' => env('PACKT_TOKEN', ''),
    'get_product'=>'https://api.packt.com/api/v1/products?token=',
];