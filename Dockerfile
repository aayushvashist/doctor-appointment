# Dockerfile (PHP-FPM)
FROM php:8.2-fpm

ARG UID=1000
ARG GID=1000

# System packages
RUN apt-get update && apt-get install -y \
    git curl zip unzip libonig-dev libxml2-dev libzip-dev libpng-dev libjpeg-dev libfreetype6-dev \
    libicu-dev procps nano supervisor && rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring xml zip bcmath gd intl

# Install composer (official composer image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install redis extension optional (comment out if not needed)
RUN pecl install redis && docker-php-ext-enable redis || true

# Create app user to match host UID/GID
RUN groupadd -g ${GID} appgroup || true \
 && useradd -u ${UID} -g ${GID} -m appuser || true

WORKDIR /var/www/html

# Copy composer files first for caching
COPY composer.json composer.lock* /var/www/html/

# Install composer dependencies (dev for local)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader || true

# Copy remaining code
COPY . /var/www/html

# Correct permissions for storage & cache
RUN chown -R appuser:appgroup /var/www/html/storage /var/www/html/bootstrap/cache || true

# Copy entrypoint and make executable
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

USER appuser

EXPOSE 9000

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]
