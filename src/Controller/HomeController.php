<?php

namespace MiniApp\Controller;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequest;
use Latte\Engine;

/**
 * Controller dedicated to the landing actions.
 *
 * @author Nicolás Palumbo <n@xinax.net>
 */
class HomeController
{
    /** @var string */
    private $foo = "bar";

    /**
     * TODO: Dependency injection for controllers.
     *
     * @return void
     */
    public function __construct(Engine $latte)
    {
        $this->foo = "Testing";
    }

    /**
     * @param ServerRequest $request
     *
     * @return  HtmlResponse
     */
    public function index(ServerRequest $request) : ResponseInterface
    {
        $uri = $request->getUri();

        return new HtmlResponse("The current uri is: $uri");
    }

    /**
     * @param ServerRequest $request
     *
     * @return  HtmlResponse
     */
    public function restricted(ServerRequest $request) : ResponseInterface
    {
        return new HtmlResponse("Restricted Area");
    }
}
