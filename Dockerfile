FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html
COPY . /var/www/html
COPY docker/entrypoint.sh /usr/local/bin/techshop-entrypoint
RUN sed -i 's/\r$//' /usr/local/bin/techshop-entrypoint && chmod +x /usr/local/bin/techshop-entrypoint

EXPOSE 80
ENTRYPOINT ["techshop-entrypoint"]
