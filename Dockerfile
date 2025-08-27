# Imagem oficial do PHP com Apache
FROM php:8.3-apache

# Instala dependências necessárias para mysqli e pdo_mysql
RUN apt-get update && apt-get upgrade -y \
    && apt-get install -y default-mysql-client default-libmysqlclient-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copia seu site para o Apache
COPY ./src/ /var/www/html/

# Permissões do diretório
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Configuração de permissões do Apache
RUN echo "<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" > /etc/apache2/conf-available/site-permissions.conf && \
    a2enconf site-permissions

# Porta exposta
EXPOSE 80