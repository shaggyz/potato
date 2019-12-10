<?php

namespace MiniApp\Controller;

use Zend\Diactoros\Response\HtmlResponse;

class HomeController
{
    private $foo = "bar";

    public function __construct()
    {
        $this->foo = "Testing";
    }

    public function index() : HtmlResponse
    {
        return new HtmlResponse("ASdsa {$this->foo}");
    }

    public function restricted() : HtmlResponse
    {
        return new HtmlResponse("Restricted Area");
    }
}
