FROM php:7.3-apache

#Install git and MySQL extensions for PHP

RUN apt-get update && apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite

COPY admin  /var/www/html/
COPY home_page /var/www/html/
COPY supplier /var/www/html/
COPY index.html /var/www/html/
EXPOSE 80/tcp
EXPOSE 443/tcp