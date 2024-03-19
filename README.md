# Client Manager

This is a full stack application built with PHP and MySQL. It is a simple client manager that allows you to add, edit, and delete clients and their addresses.

## Installation

Make sure you have PHP, Composer and Docker installed:

```
php -v
composer -v
docker -v
```

Install the dependencies:

```
composer install
```

Start the database with Docker Compose:

```
docker-compose up -d
```

Start the application:

```
composer start
```

## Usage

Open your browser and go to `http://localhost:8888`.

You can login with the following credentials:

```
Email: john.doe@gmail.com
Password: 123456
```
