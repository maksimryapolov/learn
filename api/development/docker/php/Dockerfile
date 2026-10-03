FROM php:8.4-fpm

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./api/development/docker/common/php/conf.d /usr/local/etc/php/conf.d

WORKDIR /var/www/html
