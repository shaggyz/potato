<?php declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals();

$config = require __DIR__ . "/../config/app.dist.php";
$routes = require __DIR__ . "/../config/routes.php";
$container = require __DIR__ . "/../config/services.php";

$app = new MiniApp\Kernel($container, $config);

$app->loadRoutes($routes);
$app->processRequest($request);