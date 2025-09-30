FROM php:8.1-apache

# Instala las extensiones PDO y pdo_mysql necesarias para conectar con MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Activa mod_rewrite
RUN a2enmod rewrite

# Limpia archivos antiguos
RUN rm -rf /var/www/html/*

# Copia el código fuente al contenedor
COPY . /var/www/html/

# Cambia permisos
RUN chown -R www-data:www-data /var/www/html

# Permitir .htaccess con AllowOverride All
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]
