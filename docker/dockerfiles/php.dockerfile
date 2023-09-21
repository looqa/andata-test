FROM php:8.1-fpm
WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

RUN docker-php-ext-install pdo pdo_mysql mysqli && \
    docker-php-ext-enable pdo pdo_mysql mysqli