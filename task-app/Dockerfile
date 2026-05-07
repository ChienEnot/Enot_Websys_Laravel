FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    curl zip unzip git nodejs npm \
    libpq-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring xml

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer update --no-dev --optimize-autoloader --no-scripts --no-interaction
RUN npm install && npm run build

EXPOSE $PORT
CMD php artisan optimize:clear && php artisan serve --host=0.0.0.0 --port=$PORT