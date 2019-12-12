<?php

$container = new League\Container\Container;

//
// In this file you can configure your services and bugs.
//

// Dependencies
$container->add(Latte\Engine::class);

// Controllers
$container->add(MiniApp\Controller\HomeController::class)
            ->addArgument(Latte\Engine::class)
            ->addArgument($config);

return $container;
