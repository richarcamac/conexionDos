# Usa la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Activa el módulo rewrite de Apache
RUN a2enmod rewrite

# Elimina cualquier archivo antiguo para evitar caché
RUN rm -rf /var/www/html/*

# Copia todo el contenido de tu proyecto al directorio del servidor
COPY . /var/www/html/

# Cambia el propietario de los archivos a www-data para evitar problemas de permisos
RUN chown -R www-data:www-data /var/www/html

# Cambia AllowOverride None a AllowOverride All para que funcione .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Exponer puerto 80 para el tráfico HTTP
EXPOSE 80

# Comando para iniciar Apache en primer plano (necesario para Docker)
CMD ["apache2-foreground"]
