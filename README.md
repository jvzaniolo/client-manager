# Client Manager

This is a full-stack application built with PHP and MySQL. It is a simple client manager that allows you to add, edit, and delete clients and their addresses.

![edit-page](https://github.com/jvzaniolo/client-manager/assets/54036572/74fb585c-eb91-48ed-960f-fdaeff29c224)

## Overview

The application has the following structure:

- `public/index.php` is the application's entry point, where the autoloader is required and the application is started.
- `src/Core` contains the application core, such as implementing the Router, Database, Renderer, etc.
- `src/Handlers` contains the request handlers for the application routes.
  - `GET` requests call the handler `loader` method if it exists
  - `POST` requests call the `action` method if it exists.
  - Handlers can also have a `render` method to render the HTML template.
- `src/Middleware` contains the middleware classes such as `Auth` and `Guest` middlewares for protected routes.
- `src/templates` contains the HTML templates rendered with Plates.
- `src/routes.php` registers the application routes and their handlers.
- `src/utils.php` contains helper functions like `dd` for debugging.

## Installation

1. Make sure you have PHP 8.\*, Composer, and Docker installed:

```
php -v
composer -v
docker -v
```

2. Install the dependencies:

```
composer install
```

3. Start the database with Docker Compose:

```
docker-compose up -d
```

This command will start a MySQL database on port 3306.

4. Start the application:

```
composer start
```

This command will copy the `.env.example` file to `.env` and start the PHP built-in server.

## Usage

Open your browser and navigate to `http://localhost:8888`.

You can log in with the following credentials:

```
Email: john.doe@gmail.com
Password: 123456
```
