FROM php:8.1.0-apache

# Çalışma dizinini ayarlayın
WORKDIR /var/www/html

# Apache'de rewrite modülünü etkinleştirin
RUN a2enmod rewrite

# Gerekli bağımlılıkları yükleyin
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    vim \
    npm

# Composer'ı kopyalayın
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Gerekli PHP uzantılarını yükleyin ve yapılandırın
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gettext intl pdo_mysql gd

# Laravel dizinlerini oluşturun
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache

# Dizin izinlerini ayarlayın
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Node.js bağımlılıklarını yükleyin (örnek olarak package.json'ı kopyalayıp npm install yapabilirsiniz)
COPY package*.json ./
RUN npm install

# Temizleme işlemi
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
