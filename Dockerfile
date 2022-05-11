FROM php:8-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql

COPY $PWD/index.php /var/www/html
COPY $PWD/php.ini /usr/local/etc/php

EXPOSE 80