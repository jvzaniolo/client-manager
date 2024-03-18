<?php

namespace App\Core;

class Application
{
    protected static $container;

    public static function set($container)
    {
        static::$container = $container;
    }

    public static function get($class)
    {
        return static::$container->get($class);
    }
}
