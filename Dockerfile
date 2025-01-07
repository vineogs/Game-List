# Usar a imagem oficial do PHP com Apache
FROM php:8.1-apache

# Instalar extensões necessárias para o MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Ativar o mod_rewrite do Apache (útil para frameworks como Laravel)
RUN a2enmod rewrite
