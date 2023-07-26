FROM php:7.4-apache

RUN apt-get update && apt-get install -y libonig-dev \
    && docker-php-ext-install pdo_mysql mysqli mbstring

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN composer require panique/php-sass