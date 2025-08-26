# Imagem oficial do PHP com Apache
FROM php:8.3-apache

# Atualiza pacotes do sistema para corrigir vulnerabilidades
RUN apt-get update && apt-get upgrade -y && apt-get clean

# Extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql 

# Copia seu site para o Apache
COPY ./src/ /var/www/html/

# Permitir override e acesso completo ao diretório
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

RUN echo "<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" > /etc/apache2/conf-available/site-permissions.conf && \
    a2enconf site-permissions

# Define a porta que o contêiner irá expor
EXPOSE 80