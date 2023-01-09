# php
FROM php:8.0.11-fpm

# 独自の php.ini
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
# Composer install:PHP ライブラリ管理とかのやつ
COPY --from=composer /usr/bin/composer /usr/bin/composer

# install Node.js: Vue開発用
COPY --from=node:18.12 /usr/local/bin /usr/local/bin
COPY --from=node:18.12 /usr/local/lib /usr/local/lib

# UbuntuのOSとして必要なやつインストール
RUN apt-get update && \
    apt-get -y install \
    git \
    zip \
    unzip \
    vim \
    libpq-dev \
    libmemcached-dev \
    zlib1g-dev \
    && docker-php-ext-install pgsql pdo_pgsql bcmath
# php 標準以外の 拡張モジュールのインストール (for memcached)
RUN pecl install memcached && docker-php-ext-enable memcached
# memcached 確認用 memcached-tool コマンドインストール
RUN curl -o /usr/bin/memcached-tool https://raw.githubusercontent.com/memcached/memcached/1.4.35/scripts/memcached-tool
RUN chmod +x /usr/bin/memcached-tool

# srcとなるディレクトリ？なのかw
WORKDIR /var/www/html