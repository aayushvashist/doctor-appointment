#!/bin/sh
set -e

# Ensure permissions
mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache
chown -R appuser:appgroup /var/www/html/storage /var/www/html/bootstrap/cache || true
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true

# If .env exists and APP_KEY empty, generate key
if [ -f /var/www/html/artisan ]; then
  if [ -f /var/www/html/.env ] && [ -z "$APP_KEY" ]; then
    php /var/www/html/artisan key:generate --no-interaction || true
  fi
fi

exec "$@"
