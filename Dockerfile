FROM node:22-alpine AS assets

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm run build

FROM php:8.3-cli

RUN apt-get update \
    && apt-get install -y --no-install-recommends libonig-dev libsqlite3-dev libzip-dev unzip \
    && docker-php-ext-install mbstring pdo_sqlite zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

COPY . .
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader \
    && touch database/database.sqlite \
    && chown -R www-data:www-data storage bootstrap/cache database

COPY --from=assets /app/public/build ./public/build

ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    SESSION_DRIVER=file \
    CACHE_STORE=file \
    QUEUE_CONNECTION=sync

USER www-data

# Situs ini tidak memakai database, jadi migrasi tidak dijalankan.
# Jika APP_KEY belum di-set di environment, buat kunci sementara agar app tidak error 500.
CMD ["sh", "-c", "if [ -z \"$APP_KEY\" ]; then export APP_KEY=$(php artisan key:generate --show); fi; exec php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
