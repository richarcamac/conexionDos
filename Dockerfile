# Usa la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Habilita mod_rewrite
RUN a2enmod rewrite

# Copia los archivos del proyecto al directorio raíz de Apache
COPY . /var/www/html/

# Establece permisos adecuados (opcional pero recomendado)
RUN chown -R www-data:www-data /var/www/html

# Permite el uso de .htaccess modificando apache2.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Exponer el puerto 80
EXPOSE 80
