#!/bin/bash
set -euo pipefail

chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache

if [ "${LARAVEL_KEY_GENERATE-}" == "true" ] ; then 
    php artisan key:generate
fi

if [ "${LARAVEL_DB_MIGRATE-}" == "true" ] ; then 
    php artisan migrate
fi

if [ "${LARAVEL_DB_SEED-}" == "true" ] ; then 
    php artisan db:seed
fi

# start nginx
/usr/sbin/nginx -g 'daemon off;pid /run/nginx.pid;' &

# php-fpm
exec "$@"
