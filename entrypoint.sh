#!/bin/bash

# Aguarda o banco de dados estar disponível
echo "⏳ Aguardando o banco de dados..."
until nc -z db 3306; do
  sleep 1
done

# Instala dependências do Composer
echo "📦 Instalando dependências..."
composer install --no-interaction --prefer-dist

# Gera chave da aplicação
echo "🔐 Gerando chave da aplicação..."
php artisan key:generate

# Executa as migrations
echo "📂 Executando migrations..."
php artisan migrate --force

# Ajusta permissões necessárias para Laravel
echo "🛠️ Ajustando permissões..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Inicia o Apache
echo "🚀 Iniciando Apache..."
apache2-foreground
