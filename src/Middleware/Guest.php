<?php

namespace App\Middleware;

class Guest
{
  public function handle()
  {
    if (isset ($_SESSION['user_id'])) {
      header('Location: /');
      exit();
    }
  }
}
