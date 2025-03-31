# Usa una imagen base con soporte completo para MySQL
FROM php:8.2-fpm

# Instala las dependencias necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libmariadb-dev \
    && docker-php-ext-install pdo_mysql mysqli \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copia el código del proyecto al contenedor
COPY . /var/www/html/

# Otorga permisos a los archivos
RUN chown -R www-data:www-data /var/www/html