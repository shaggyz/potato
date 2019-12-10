<?php

namespace MiniApp;

use League\Route\Router;
use Zend\Diactoros\ServerRequest;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

class Kernel
{
    /** @var Router */
    private $router;

    /**
     * Sets the kernel dependencies
     */
    public function __construct()
    {
        $this->router = new Router;
    }

    public function loadRoutes(array $routes) : void
    {
    }

    /**
     * Process a server request and sends a response to the client.
     *
     * @param ServerRequest $request
     *
     * @return  void
     */
    public function processRequest(ServerRequest $request) : void
    {
        $response = $this->router->dispatch($request);
        (new SapiEmitter)->emit($response);
    }
}
