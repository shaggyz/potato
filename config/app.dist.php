<?php

//
// Here you configure your application instance.
//

return [
    // Application name, spend all your resources here
    'name' => 'MiniApp',

    // Application environment, potato is a valid name.
    'environment' => 'dev',

    // Controllers namespace, you can place the files wherever you want.
    'controllers' => 'MiniApp\\Controller\\',

    // Template directory path.
    'templates' => __DIR__ . '/../src/Template/',

    // Debug flag, hackers will love you if you enable this in production.
    'debug' => true,

    // Database connections
    'database' => [

        // Database connections
        'default' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'example_db',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],

    ]
];
