#$ sudo apt install -y php-mysql
# FROM php:7.2-apache
FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql

RUN apt update -y
RUN apt install curl git vim unzip -y
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

#RUN apt install -y php-mysql
