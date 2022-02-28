<?php

use Illuminate\Support\Str;
return  [
    'default' => 'mongodb',

    'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', ''),
            'username'  => env('DB_USERNAME', ''),
            'password'  => env('DB_PASSWORD', ''),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ],
        'mongodb' => [
          'driver' => 'mongodb',
          'dsn' => 'mongodb+srv://nilesh:nilesh123@cluster0.inuax.mongodb.net/telemetry?retryWrites=true&w=majority',
          'database' => 'telemetry',
        ]
       
    ],
];
?>