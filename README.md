# Client Manager

This is a full-stack application built with PHP and MySQL. It is a simple client manager that allows you to add, edit, and delete clients and their addresses.

![edit-page](https://github.com/jvzaniolo/client-manager/assets/54036572/74fb585c-eb91-48ed-960f-fdaeff29c224)

## What I learned

There aren't a lot of recent resources online when it comes to using pure PHP in 2024, so I wrote a blog post sharing the things I learned.

<a href="https://dev.to/jvzaniolo/php-in-2024-3l17">
  <img width="500" src="https://github.com/jvzaniolo/client-manager/assets/54036572/ac54cee5-c1bc-455e-825e-2b5a607afd0b" alt="Learning PHP in 2024 - DEV Community">
</a>

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

## Running with Docker

1. Make sure you have Docker installed:

```
docker -v
```

2. Start the application and the database with Docker Compose:

```
docker-compose up -d
```

3. Open your browser and navigate to http://localhost:8888.

You can log in with the following credentials:

```
Email: john.doe@gmail.com
Password: 123456
```

## Running locally

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
docker-compose up -d db
```

This command will start a MySQL database on port :3306.

You can also use a local version of MySQL, just make sure to update the `.env` file with your database credentials.

4. Start the application:

```
composer start
```

This command will copy the `.env.example` file to `.env` and start the PHP built-in server.

5. Open your browser and navigate to http://localhost:8888.

You can log in with the following credentials:

```
Email: john.doe@gmail.com
Password: 123456
```

## Cleaning up Docker

To stop the Docker containers, run:

```
docker-compose down -v --rmi all
```

This will stop the containers, remove the volumes, and delete the images.

---

<p align="center">Made with 🧡 by <a href="https://jvzaniolo.vercel.app/">@jvzaniolo</a></p>
