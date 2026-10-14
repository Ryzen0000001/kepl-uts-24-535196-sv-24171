#STAGE 1: Build
FROM php:8.2.34-cli-alpine3.24 AS build
RUN apk add --no-cache unzip
COPY --from=composer:2.10.3 /usr/bin/composer /usr/bin/composer
WORKDIR /app

#Dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --no-interaction --prefer-dist

COPY . .
RUN composer dump-autoload --no-dev --optimize \
 && rm -rf /root/.cache /root/.composer

#STAGE 2: Runtime
FROM php:8.2.34-cli-alpine3.24 AS runtime
RUN addgroup -S app && adduser -S -G app -h /app app
WORKDIR /app

COPY --from=build --chown=app:app /app /app

RUN mkdir -p storage/framework/cache storage/framework/sessions \
             storage/framework/views storage/logs bootstrap/cache database \
 && chown -R app:app storage bootstrap/cache database

USER app
EXPOSE 8000

HEALTHCHECK --interval=30s --timeout=5s --start-period=20s --retries=3 \
  CMD wget -q -O /dev/null http://127.0.0.1:8000/up || exit 1

CMD ["sh", "-c", "touch database/database.sqlite && php artisan migrate --force && exec php artisan serve --host=0.0.0.0 --port=8000"]