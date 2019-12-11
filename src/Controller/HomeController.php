<?php

namespace MiniApp\Controller;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequest;
use Latte\Engine;

/**
 * Controller dedicated to the landing actions.
 */
class HomeController
{
    /** @var array */
    private $config;

    /** @var Engine */
    private $latte;

    /**
     * @param Engine $latte
     * @param array $config
     */
    public function __construct(Engine $latte, array $config)
    {
        $this->latte = $latte;
        $this->config = $config;
    }

    /**
     * @param ServerRequest $request
     *
     * @return  HtmlResponse
     */
    public function index(ServerRequest $request) : ResponseInterface
    {
        $uri = $request->getUri();

        return new HtmlResponse("The current uri is: $uri. Foo is: {$this->foo}");
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

    /**
     * @param ServerRequest $request
     *
     * @return  HtmlResponse
     */
    public function template(ServerRequest $request) : ResponseInterface
    {
        $template = $this->config['templates'] . "index.html";

        $parameters = [
            'key' => 'value',
            'foo' => [1, 2, 3, 4, 5, 6, 7],
            'bool' => true
        ];

        return new HtmlResponse(
            $this->latte->renderToString($template, $parameters)
        );
    }
}
