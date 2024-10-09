# Utilizar la imagen oficial de PHP con Apache
FROM php:7.4-apache

# Instalar extensiones de PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar los archivos del proyecto al directorio raíz de Apache
COPY . /var/www/html/

# Dar permisos de escritura a la carpeta
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponer el puerto 80 para acceder a la aplicación
EXPOSE 80


#hola
