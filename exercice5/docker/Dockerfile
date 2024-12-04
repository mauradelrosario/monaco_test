FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
unzip \
libzip-dev \
&& docker-php-ext-install mysqli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN chown -R www-data:www-data /var/www/html\
&& chmod -R 777 /var/www/html \
&& a2enmod rewrite

COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html

RUN composer install

