FROM node:8
WORKDIR /src
ADD . /src
RUN npm install && npm run production

FROM php:7.2.3-fpm-alpine

RUN apk add --no-cache \
        bash \
        sed \
        nginx

RUN set -ex; \
    \
    apk add --no-cache --virtual .build-deps \
        libjpeg-turbo-dev \
        libpng-dev \
        libxml2-dev \
    ; \
    \
    docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr; \
    docker-php-ext-install gd pdo_mysql pdo mbstring opcache; \
    \
    runDeps="$( \
        scanelf --needed --nobanner --recursive \
            /usr/local/lib/php/extensions \
            | awk '{ gsub(/,/, "\nso:", $2); print "so:" $2 }' \
            | sort -u \
            | xargs -r apk info --installed \
            | sort -u \
    )"; \
    apk add --virtual .laravel-phpexts-rundeps $runDeps; \
    apk del .build-deps

RUN { \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.interned_strings_buffer=8'; \
        echo 'opcache.max_accelerated_files=4000'; \
        echo 'opcache.revalidate_freq=2'; \
        echo 'opcache.fast_shutdown=1'; \
        echo 'opcache.enable_cli=1'; \
        echo 'upload_max_filesize=5M'; \
        echo 'post_max_size=10M'; \
    } > /usr/local/etc/php/conf.d/opcache-recommended.ini

COPY --from=0 /src /var/www/html


COPY docker/nginx.conf /etc/nginx/nginx.conf

COPY docker/docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]

WORKDIR /var/www/html
ADD https://getcomposer.org/download/1.6.5/composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer && \
    /usr/local/bin/composer install && \
    chown -R www-data:www-data /var/www/html

EXPOSE 80 9000
CMD ["php-fpm"]
