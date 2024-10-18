# Usar a imagem oficial do PHP com Apache
FROM php:8.3-apache

WORKDIR /var/www/html

COPY . .

# Copiar o script de instalação para o contêiner
COPY docker/script.sh /usr/local/bin/script.sh

# Dar permissões de execução ao script
RUN chmod +x /usr/local/bin/script.sh

# Executar o script para instalar dependências e configurar o ambiente
RUN /usr/local/bin/script.sh

# Definir permissões corretas
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

# Habilitar os módulos rewrite e ssl do Apache
RUN a2enmod rewrite ssl

# Definir o ServerName para suprimir o aviso
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expor as portas padrão do Apache
EXPOSE 80 443

# Comando final para rodar o Apache
CMD ["apache2-foreground"]
