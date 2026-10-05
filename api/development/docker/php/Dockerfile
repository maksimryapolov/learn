FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && rm -rf /var/lib/apt/lists/*

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./api/development/docker/common/php/conf.d /usr/local/etc/php/conf.d

WORKDIR /var/www/html
