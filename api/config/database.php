<?php

  return [
    'default' => env('DB_CONN', 'mongodb'),
    'connections' => [
      'mongodb' => [
        'driver' => 'mongodb',
        'host' => env('DB_HOST', 'localhost'),
        'port' => env('DB_PORT', 27017),
        'database' => env('DB_NAME'),
        'username' => env('DB_USER'),
        'password' => env('DB_PASS'),
        'options' => [
          'database' => env('DB_NAME') // sets the authentication database required by mongo 3
        ]
      ],
    ],
    'migrations' => 'migrations',
  ];

