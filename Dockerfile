FROM php:8.2-cli

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip \
    && docker-php-ext-install zip pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
