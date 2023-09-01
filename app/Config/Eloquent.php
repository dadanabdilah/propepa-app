<?php

namespace Config;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * 
 */
class Eloquent
{

    function __construct()
    {

        $capsule = new Capsule;
        $db_config = config('Database');
        // // DBDriver
        $capsule->addConnection([
            'driver'    => 'mysql', // $db_config->default['DBDriver']
            'host'      => env('database.default.hostname'),
            'database'  => env('database.default.database'),
            'username'  => env('database.default.username'),
            'password'  => env('database.default.password'),
            'charset'  =>  $db_config->default['charset'],
            'collation' => $db_config->default['DBCollat'],
            'prefix'    => env('database.default.DBPrefix'),
            'port' => env('database.default.port')
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}
