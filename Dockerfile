FROM php:8.2-apache

RUN apt-get update && apt-get install -y --no-install-recommends ca-certificates \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mysqli \
    && echo "short_open_tag=On" > /usr/local/etc/php/conf.d/short-tags.ini \
    && a2enmod rewrite

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
