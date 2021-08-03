FROM php:8.0-fpm-buster

COPY php.ini /user/local/etc/php/

RUN apt update
RUN apt install -y wget git unzip libpq-dev

# Set env
ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:2.1.3 /usr/bin/composer /usr/bin/composer

# Install Node.js 12
RUN apt install -y npm \
    && npm install n -g \
    && n 12

# Install PHP Extensions
RUN apt install -y zlib1g-dev mariadb-client libzip-dev libonig-dev \
    && docker-php-ext-install zip pdo_mysql

WORKDIR /var/www

# php-fpmはデフォルトのユーザwww-dataで動く。https://stackoverflow.com/questions/48619445/permission-denied-error-using-laravel-docker
# 変更する場合は /usr/local/etc/php-fpm.d/www.conf でユーザー名を変える。
RUN chown -R www-data:www-data /var/www

RUN composer global require "laravel/installer"

ENV PATH $PATH:/root/.composer/vendor/bin
