FROM php:8.1-apache

#RUN apt-get update && apt-get install -y libbz2-dev zlib1g-dev libpng-dev libgmp-dev libicu-dev \
#    libsnmp-dev libtidy-dev libxml2-dev libxslt-dev libzip-dev libmagickwand-dev libfreetype-dev \
#    libjpeg62-turbo-dev wget lsb-release --no-install-recommends

RUN apt-get update && apt-get install -y wget lsb-release libicu-dev --no-install-recommends

RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list

RUN apt update && apt upgrade -y

#RUN apt-get install -y libc-client2007e-dev libkrb5-dev git && rm -r /var/lib/apt/lists/*

#RUN docker-php-ext-configure gd --with-freetype --with-jpeg
#RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl

RUN docker-php-ext-install -j$(nproc) intl mysqli opcache pdo pdo_mysql

RUN pecl install xdebug

RUN a2enmod rewrite vhost_alias

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
