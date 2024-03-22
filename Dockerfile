FROM php
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
RUN composer install
EXPOSE 8888
CMD [ "php", "-S", "0.0.0.0:8888", "-t", "public" ]
