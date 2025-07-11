FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip netcat libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN chmod +x start.sh
RUN composer install --no-dev --optimize-autoloader

EXPOSE 8080

ENV APP_ENV=production


CMD ["./start.sh"]
