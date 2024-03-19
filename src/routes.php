<?php

use App\Core\Application;
use App\Core\Renderer;
use App\Handlers\Address\CreateAddressHandler;
use App\Handlers\Clients\CreateClientHandler;
use App\Handlers\Clients\DeleteClientHandler;
use App\Handlers\Clients\EditClientHandler;
use App\Handlers\Clients\ListClientHandler;
use App\Handlers\LoginHandler;
use App\Handlers\LogoutHandler;
use App\Handlers\RegisterHandler;
use App\Middleware\Auth;
use App\Middleware\Guest;


return function ($router) {
  // Login
  $router->add('/login', LoginHandler::class)->only(Guest::class);
  $router->add('/logout', LogoutHandler::class)->only(Auth::class);

  // Register
  $router->add('/registrar', RegisterHandler::class)->only(Guest::class);

  // Clients
  $router->add('/', ListClientHandler::class)->only(Auth::class);
  $router->add('/cliente/criar', CreateClientHandler::class)->only(Auth::class);
  $router->add('/cliente/editar', EditClientHandler::class)->only(Auth::class);
  $router->add('/cliente/excluir', DeleteClientHandler::class)->only(Auth::class);

  // Address
  $router->add('/endereco/criar', CreateAddressHandler::class)->only(Auth::class);

  // 404
  $router->add('*', function () {
    $render = Application::get(Renderer::class);
    return $render->template('404');
  });
};
