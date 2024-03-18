<?php

namespace App\Core;

class Middleware
{
    public static function resolve($middleware)
    {
        if (!$middleware)
            return;
        (new $middleware)->handle();
    }
}
