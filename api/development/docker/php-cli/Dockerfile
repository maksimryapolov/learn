FROM php:8.4-cli-alpine

# Устанавливаем системные утилиты через apk (как у автора)
RUN apk update && apk add --no-cache unzip git

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./api/development/docker/common/php/conf.d /usr/local/etc/php/conf.d

ENV COMPOSER_ALLOW_SUPERUSER 1

# Современный способ: без curl, без скачивания скриптов и без мертвого prestissimo
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html
