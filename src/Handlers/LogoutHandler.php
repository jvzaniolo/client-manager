<?php

namespace App\Handlers;

class LogoutHandler
{
    public function loader()
    {
        $_SESSION = [];
        header('Location: /login', true, 302);
        exit;
    }
}