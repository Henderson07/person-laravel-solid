# Dockerfile
FROM php:8.1-apache

# Instala extensões do PHP
RUN docker-php-ext-install pdo pdo_mysql

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia os arquivos do projeto
COPY . /var/www/html/

# Define o diretório de trabalho
WORKDIR /var/www/html

# Permissões
RUN chown -R www-data:www-data /var/www/html

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Exponha a porta 80
EXPOSE 80
