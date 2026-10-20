FROM php:8.2-apache

RUN apt-get update && apt-get install -y --no-install-recommends ca-certificates \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mysqli \
    && echo "short_open_tag=On" > /usr/local/etc/php/conf.d/config.ini \
    && echo "display_errors=Off" >> /usr/local/etc/php/conf.d/config.ini \
    && echo "error_reporting=E_ALL & ~E_WARNING & ~E_NOTICE" >> /usr/local/etc/php/conf.d/config.ini \
    && echo "session.cookie_path=/" >> /usr/local/etc/php/conf.d/config.ini \
    && echo "session.cookie_lifetime=604800" >> /usr/local/etc/php/conf.d/config.ini \
    && a2enmod rewrite

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
