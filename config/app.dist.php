<?php

//
// Here you configure your application instance.
//

return [
    // Application environment, potato is a valid name.
    'environment' => 'dev',

    // Controllers namespace, you can place the files wherever you want.
    'controllers' => 'MiniApp\\Controller\\',

    // Templates directory path.
    'templates' => __DIR__ . '/../src/Templates/',

    // Debug flag, hackers will love you if you enable this in production.
    'debug' => true,
];
