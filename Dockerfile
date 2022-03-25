FROM php:8.1-fpm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN echo 'zend_extension=xdebug' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.mode=coverage' >> /usr/local/etc/php/php.ini

COPY . /srv/app
WORKDIR /srv/app

CMD ["tail", "-f", "/dev/null"]
