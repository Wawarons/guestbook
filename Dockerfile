
FROM php:8.3-fpm

WORKDIR /code

COPY . .

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

EXPOSE 80
