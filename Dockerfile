FROM php:8.1-fpm

# Copy composer.lock and composer.json
#COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    software-properties-common \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    vim \
    unzip \
    git \
    curl \
    postgresql \
    postgresql-contrib \
    libpq-dev \
    libonig-dev \
    zlib1g-dev \
    libzip-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libssh2-1-dev \
    libssh2-1 \
    && pecl install ssh2-1.3.1 \
    && docker-php-ext-enable ssh2

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN apt-get upgrade -y && apt autoremove -y

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql gd zip mbstring exif pcntl gd bcmath sockets

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY src /var/www

# Copy existing application directory permissions
COPY --chown=www:www src /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
