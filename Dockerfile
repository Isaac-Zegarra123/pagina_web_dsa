# Usa una imagen base de PHP con extensiones necesarias
FROM php:8.1-fpm

# Instalar herramientas necesarias y extensiones de PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instalar Composer (gestor de dependencias de PHP)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto al contenedor
COPY . .

# Instalar las dependencias de Laravel en modo producción
RUN composer install --no-dev --optimize-autoloader

# Establecer permisos correctos para las carpetas de almacenamiento y caché
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer el puerto 8000 para Laravel
EXPOSE 8000

# Comando para iniciar la aplicación
CMD php artisan serve --host=0.0.0.0 --port=8000
