<?php

use App\Core\Application;
use App\Core\Container;
use App\Core\Database;
use App\Core\Renderer;
use App\Core\Router;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
$dotenv->required('DATABASE_DSN');

const ROOT = __DIR__ . '/../src/';

require ROOT . 'utils.php';

// Bootstrap the application
session_start();

$container = new Container();
$container->set(Renderer::class, fn() => new Renderer());
$container->set(Database::class, fn() => new Database($_ENV['DATABASE_DSN']));

Application::set($container);

error_reporting(E_ALL);

$router = new Router();
$routes = require ROOT . 'routes.php';
$routes($router);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router->route($uri, $_SERVER['REQUEST_METHOD']);
