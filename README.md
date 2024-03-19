# Client Manager

This is a full-stack application built with PHP and MySQL. It is a simple client manager that allows you to add, edit, and delete clients and their addresses.

## Installation

1. Make sure you have PHP 8.*, Composer, and Docker installed:

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
