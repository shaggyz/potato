<?php declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals();

$routes = require __DIR__ . "/../config/routes.php";

$application = new MiniApp\Kernel();
$application->processRequest($request);

// Application routes
// $router->map('GET', '/', 'MiniApp\Controller\HomeController::index');
// $router->map('GET', '/restricted', 'MiniApp\Controller\HomeController::restricted');
