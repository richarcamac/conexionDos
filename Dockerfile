# Usa una imagen oficial de PHP con Apache
FROM php:8.1-apache

# Habilita mod_rewrite
RUN a2enmod rewrite

# Establece permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Copia todo el contenido del proyecto al servidor Apache
COPY . /var/www/html/

# Configura Apache para permitir .htaccess en /var/www/html
RUN sed -i 's|AllowOverride None|AllowOverride All|g' /etc/apache2/apache2.conf

# Expone el puerto 80
EXPOSE 80
