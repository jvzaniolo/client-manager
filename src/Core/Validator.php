<?php

namespace App\Core;

class Validator
{
    public static function string($value)
    {
        return strlen(trim($value)) > 0;
    }
}
