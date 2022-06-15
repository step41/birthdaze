<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONN', 'mongodb'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'mongodb' => [
            'driver'   => 'mongodb',
            'dsn'      => env('DB_DSN', 'mongodb://localhost:27017'),
            'host'     => env('DB_HOST', 'localhost'),
            'port'     => env('DB_PORT', 27017),
            'database' => env('DB_NAME', 'local'),
            'username' => env('DB_USER'),
            'password' => env('DB_PASS'),
            'options'  => [
                'database' => 'admin', // sets the authentication database required by mongo 3
                'databaseName' => 'admin',
                'authSource' => 'admin',
                //'tls' => true,
                //'serverSelectionTryOnce' => false,
            ]/* ,
            'driver_options' => [
                'context' => [
                    'ssl' => [
                        'cafile' => '/home/ubuntu/.ssh/rds-combined-ca-bundle.pem',
                        'allow_self_signed' => true,
                        'verify_peer' => true,
                        'verify_peer_name' => true,
                        'verify_expiry' => true,
                    ]
                ]
            ] */
        ],

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_NAME', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_NAME', 'forge'),
            'username' => env('DB_USER', 'forge'),
            'password' => env('DB_PASS', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_NAME', 'forge'),
            'username' => env('DB_USER', 'forge'),
            'password' => env('DB_PASS', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_NAME', 'forge'),
            'username' => env('DB_USER', 'forge'),
            'password' => env('DB_PASS', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASS', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
