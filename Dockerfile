FROM php:7.2-apache
RUN docker-php-ext-install mysqli  
RUN docker-php-ext-enable mysqli
COPY . /var/www/html/