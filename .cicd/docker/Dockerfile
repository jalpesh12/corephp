FROM php:7.4-fpm-alpine3.13

ARG GITHUB_TOKEN

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apk add --no-cache --update \
    $PHPIZE_DEPS \
    icu-dev \
    libxml2-dev \
    pcre-dev \
    shadow \
    zip \
    bash \
    vim \
    unzip \
    git \
    curl

# Install extensions
RUN docker-php-ext-install pdo_mysql exif pcntl \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo 'xdebug.mode=coverage' > /usr/local/etc/php/conf.d/xdebug.ini

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer.lock and composer.json
COPY composer.json ./

RUN composer config github-oauth.github.com "$GITHUB_TOKEN"

RUN composer install --no-dev --no-scripts --no-autoloader \
    && composer dump-autoload --optimize;

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]