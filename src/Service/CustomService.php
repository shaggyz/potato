<?php

namespace MiniApp\Service;

class CustomService
{
    public function __construct()
    {
    }

    static public function doSomething() : string
    {
        return 'Doing something';
    }

    public function doSomethingElse(string $parameter, int $times) : string
    {
       return $parameter;
    }
}


