FROM ubuntu:22.04

ENV timezone America/Recife

# Instalar pacotes necessários e adicionar o repositório para PHP atualizado
RUN apt-get update && \
    ln -snf /usr/share/zoneinfo/${timezone} /etc/localtime && \
    echo ${timezone} > /etc/timezone && \
    apt-get install -y software-properties-common curl && \
    add-apt-repository ppa:ondrej/php && \
    apt-get update && \
    apt-get install -y \
    mc apache2 php8.2 php8.2-mysql php8.2-curl php8.2-gd \
    php8.2-zip php8.2-xml php8.2-mbstring && \
    rm -rf /var/lib/apt/lists/* && \
    apt-get purge -y --auto-remove software-properties-common curl && \
    chown www-data:www-data /var/www/html -R

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# Copiar Composer diretamente da imagem oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Verificar se o Composer foi instalado corretamente
RUN composer --version

# Expor a porta 80
EXPOSE 80

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos para o diretório de trabalho (opcional, se você tiver arquivos)
COPY ./ /var/www/html

RUN mkdir -p /var/www/html/SCGA/anexoEditais && \
    chown -R www-data:www-data /var/www/html/SCGA/anexoEditais && \
    chmod -R 775 /var/www/html/SCGA/anexoEditais
    
# Iniciar o Apache em primeiro plano
CMD ["apachectl", "-D", "FOREGROUND"]