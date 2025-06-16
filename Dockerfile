
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev mysql-client \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-scripts --no-autoloader

RUN chown -R www-data:www-data /var/www

EXPOSE 9000

CMD ["php-fpm"]
