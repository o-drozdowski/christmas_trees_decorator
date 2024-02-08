FROM php:8.1-fpm-alpine

RUN apk --no-cache add \
        bash \
        git \
        unzip \
        icu-dev \
        libzip-dev \
    && docker-php-ext-install pdo_mysql intl zip bcmath
# INSTALL AND UPDATE COMPOSER
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer self-update
WORKDIR /usr/src/myapp
COPY . .

# INSTALL YOUR DEPENDENCIES
RUN composer install
CMD bash -c "composer install && php ./index.php"

#CMD ["php", "-S", "0.0.0.0:8080", "-t", "./", "index.php"]