FROM php:8.2-cli

WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy project files
COPY . /var/www/html

# Set permissions for writable folders
RUN chmod -R 755 /var/www/html \
    && mkdir -p /var/www/html/logs /var/www/html/upload /var/www/html/cache \
    && chmod -R 777 /var/www/html/logs /var/www/html/upload /var/www/html/cache

# Expose port for PHP built-in server
EXPOSE 8000

# Start PHP server
CMD ["php", "-S", "0.0.0.0:8000", "index.php"]
