FROM php:7.4-apache

# Instalar extensiones de PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Cambiar el puerto de Apache para que escuche en el puerto 8080
RUN sed -i 's/80/8080/' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's/80/8080/' /etc/apache2/ports.conf

# Copiar los archivos del proyecto al directorio raíz de Apache
COPY . /var/www/html/

# Dar permisos de escritura a la carpeta
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponer el puerto 8080 para Google Cloud Run
EXPOSE 8080

# Comando para iniciar Apache en primer plano
CMD ["apache2-foreground"]

