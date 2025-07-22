FROM php:8.1-apache

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    netcat-openbsd \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Instala o Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Habilita mod_rewrite do Apache (necessário para Laravel)
RUN a2enmod rewrite

# Define diretório de trabalho
WORKDIR /var/www/html

# Copia todos os arquivos do projeto Laravel
COPY . .

# Ajusta permissões para o Apache acessar os arquivos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Copia e aplica permissão de execução ao script de inicialização
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Altera o DocumentRoot para a pasta "public"
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Expõe a porta padrão do Apache
EXPOSE 80

# Executa o script de entrada
ENTRYPOINT ["/entrypoint.sh"]
