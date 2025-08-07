FROM php:8.2.24-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install Nodejs
RUN apt-get install -y nodejs npm

# Create Directory npm
RUN mkdir -p /var/www/.npm
RUN chown -R 33:33 /var/www/.npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
# Install  Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug


# Copy existing application directory contents
COPY . /var/www/html

# Copy Xdebug configuration
COPY xdebug.ini /usr/local/etc/php/conf.d/99-xdebug.ini


# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www/html

# Change current user to www
USER www-data

# Expose port 9003 and start php-fpm server
EXPOSE 9003
CMD ["php-fpm"]
