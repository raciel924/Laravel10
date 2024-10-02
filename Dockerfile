FROM php:8.2-fpm


RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    curl


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /var/www/html


COPY . /var/www/html