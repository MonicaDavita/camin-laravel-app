FROM php:8.0-fpm-alpine

WORKDIR /var/www/app

RUN apk update && apk add \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip

RUN docker-php-ext-install pdo pdo_mysql \
    && apk --no-cache add nodejs npm

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ADD ./src/composer.json ./
ADD ./src/composer.lock ./

USER root

RUN chmod -R 777 /var/www/app

RUN composer install --no-scripts