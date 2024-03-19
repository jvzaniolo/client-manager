<?php

namespace App\Core;

class Router
{
  protected $routes = [];

  private function resolve($route, $method)
  {
    $map = [
      'GET' => 'loader',
      'POST' => 'action',
    ];

    $handler = new $route['handler'];
    $data = null;

    if (method_exists($handler, $map[$method])) {
      $handler_method = $map[$method];
      $data = $handler->$handler_method();
      if (!isset ($data)) {
        throw new \Exception("Did you forget to return the data from the {$map[$method]} method?");
      }
    }

    return method_exists($handler, 'render') ? $handler->render(["{$map[$method]}Data" => $data]) : null;
  }

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if (isset ($route['handler'])) {
        if ($route['uri'] === $uri) {
          if (isset ($route['middleware'])) {
            Middleware::resolve($route['middleware']);
          }
          $this->resolve($route, $method);
        } else {
          if ($route['uri'] === '*') {
            if (is_callable($route['handler'])) {
              $route['handler']();
            } else {
              $this->resolve($route, $method);
            }
          }
        }
      }
    }

    http_response_code(404);
    die();
  }

  public function add($uri, $handlerClass)
  {
    $this->routes[] = [
      'uri' => $uri,
      'handler' => $handlerClass,
      'middleware' => null,
    ];

    return $this;
  }

  public function only($middleware)
  {
    $this->routes[count($this->routes) - 1]['middleware'] = $middleware;

    return $this;
  }
}
