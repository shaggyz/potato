<?php

namespace MiniApp;

use League\Route\Router;
use Zend\Diactoros\ServerRequest;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Container\Container;
use League\Route\Strategy\ApplicationStrategy;
use Psr\Container\ContainerInterface;

class Kernel
{
    /** @var Router */
    private $router;

    /** @var array */
    private $config;

    /**
     * Sets the application container and configuration.
     *
     * @param ContainerInterface $container
     * @param array $config
     */
    public function __construct(ContainerInterface $container, array $config)
    {
        $router = new Router;
        $strategy = new ApplicationStrategy;

        $strategy->setContainer($container);
        $router->setStrategy($strategy);

        $this->router = $router;
        $this->config = $config;
    }

    /**
     * Configures the router with a routes array.
     *
     * @param array $routes
     *
     * @return void
     */
    public function loadRoutes(array $routes) : void
    {
        foreach ($routes as $route) {
            $route[2] = $this->config['controllers'] . $route[2];
            $this->router->map(...$route);
        }
    }

    /**
     * Process a server request and sends a response to the client.
     *
     * @param ServerRequest $request
     *
     * @return void
     */
    public function processRequest(ServerRequest $request) : void
    {
        $response = $this->router->dispatch($request);
        (new SapiEmitter)->emit($response);
    }
}
