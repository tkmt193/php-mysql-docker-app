FROM php:8.1.19-apache-bullseye
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN docker-php-ext-install pdo pdo_mysql
COPY ./app /var/www/html
COPY ./php.ini /usr/local/etc/php/
