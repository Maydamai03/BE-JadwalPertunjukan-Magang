FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy semua file ke dalam container
COPY . .

# Beri izin eksekusi pada start.sh
RUN chmod +x ./start.sh

# Install dependensi PHP dari composer
RUN composer install --no-dev --optimize-autoloader

# Expose port Laravel
EXPOSE 8000

# Gunakan start.sh sebagai entrypoint
CMD ["./start.sh"]
