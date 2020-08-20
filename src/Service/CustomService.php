<?php

namespace MiniApp\Service;

class CustomService
{
    /**
     * doSomething
     *
     * @return  string
     */
    static public function doSomething() : string
    {
        return 'Doing something';
    }

    /**
     * doSomethingElse
     *
     * @param string $parameter
     * @param int $times
     *
     * @return  string
     */
    public function doSomethingElse(string $parameter, int $times) : string
    {
       return $parameter;
    }
}


