<?php

declare(strict_types=1);

namespace App\Core;

use League\Plates\Engine;

class Renderer
{
  protected $renderer;

  public function __construct()
  {
    $engine = new Engine(ROOT . 'templates');
    $this->renderer = $engine;
  }

  public function template($template, $data = [])
  {
    echo $this->renderer->render($template, $data);
    exit;
  }
}
