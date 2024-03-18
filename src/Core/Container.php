<?php

namespace App\Core;

class Container
{
    protected $bindings = [];

    public function set($key, $value)
    {
        $this->bindings[$key] = $value;
    }

    public function get($key)
    {
        if (!isset ($this->bindings[$key])) {
            throw new \Exception("Nothing bound to {$key}");
        }

        return call_user_func($this->bindings[$key]);
    }
}
