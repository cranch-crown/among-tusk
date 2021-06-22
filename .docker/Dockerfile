FROM node:lts-alpine as node
FROM composer:latest as composer
FROM php:8.0.7-apache

RUN a2enmod
RUN a2enmod headers
RUN a2enmod rewrite
RUN rm -f /etc/apache2/sites-available/000-default.conf

RUN apt-get update && apt-get install -y bash vim

# Multi stage build で node を入れる
COPY --from=node /usr/local/bin/node /usr/local/bin/
COPY --from=node /usr/local/lib/node_modules/ /usr/local/lib/node_modules/
RUN ln -s /usr/local/bin/node /usr/local/bin/nodejs \
    && ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
    && ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npx

# Multi stage build で Composer を入れる
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get install -y libjpeg-dev libpng-dev libfreetype6-dev
RUN docker-php-ext-install gd

# Let's encypt をインストール
#RUN apt -y install certbot

WORKDIR /var/www
