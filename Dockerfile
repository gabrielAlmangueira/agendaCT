# Usar a imagem oficial do PHP com FPM
FROM php:8.2-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar os arquivos do projeto para o container
COPY . .

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expor a porta 9000 para o PHP-FPM
EXPOSE 9000

# Comando para iniciar o PHP-FPM
CMD ["php-fpm"]
