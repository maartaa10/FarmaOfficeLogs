# Usa una imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip gd

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia los archivos del proyecto al contenedor
COPY . /var/www/html

# Establece permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Expone el puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]