FROM php:8.1-fpm-alpine

# INSTALL ZIP TO USE COMPOSER
# RUN apt-get update && apt-get install -y \
#     zlib1g-dev \
#     libzip-dev \
#     unzip
# RUN docker-php-ext-install zip
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
#CMD php ./main.php
#EXPOSE 8080
#CMD ["php", "-S", "0.0.0.0:8080", "-t", "./", "main.php"]