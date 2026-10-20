#!/bin/sh
set -e

# Replace PORT in nginx config if Railway provides dynamic $PORT
PORT="${PORT:-80}"
sed -i "s/listen 80;/listen ${PORT};/g" /etc/nginx/http.d/default.conf
sed -i "s/listen \[::\]:80;/listen \[::\]:${PORT};/g" /etc/nginx/http.d/default.conf

# Setup Laravel directories permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Run storage link if not linked
php artisan storage:link || true

# Run database migrations and seeding
if [ "$RUN_MIGRATIONS" = "true" ] || [ -n "$DB_HOST" ] || [ -n "$MYSQLHOST" ]; then
    echo "Running database migrations..."
    php artisan migrate --force || true
    
    if [ "$RUN_SEEDER" = "true" ]; then
        echo "Running database seeders..."
        php artisan db:seed --force || true
    fi
fi

# Cache configuration, routes and views in production
if [ "$APP_ENV" = "production" ]; then
    php artisan config:cache || true
    php artisan route:cache || true
    php artisan view:cache || true
fi

echo "Starting PHP-FPM..."
php-fpm83 -D || php-fpm -D

echo "Starting Nginx on port ${PORT}..."
exec nginx -g "daemon off;"
