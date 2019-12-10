<?php

namespace MiniApp;

use League\Route\Router;
use Zend\Diactoros\ServerRequest;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

class Kernel
{
    /** @var Router */
    private $router;

    /** @const string */
    const CONTROLLER_NAMESPACE = "MiniApp\Controller\\";

    /**
     * Sets the kernel dependencies
     */
    public function __construct()
    {
        $this->router = new Router;
    }

    /**
     * Configures the router with a routes array
     *
     * @param array $routes
     * @return  void
     */
    public function loadRoutes(array $routes) : void
    {
        foreach ($routes as $route) {
            $route[2] = static::CONTROLLER_NAMESPACE . $route[2];
            $this->router->map(...$route);
        }
    }

    /**
     * Process a server request and sends a response to the client.
     *
     * @param ServerRequest $request
     * @return void
     */
    public function processRequest(ServerRequest $request) : void
    {
        $response = $this->router->dispatch($request);
        (new SapiEmitter)->emit($response);
    }
}
