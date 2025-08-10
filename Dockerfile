# Use an official PHP image with FPM
FROM php:8.3-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy the Laravel application files
COPY . /var/www

# Run Composer install
RUN composer install --no-dev --optimize-autoloader

# Give ownership of the files to the www-data user
RUN chown -R www-data:www-data /var/www
