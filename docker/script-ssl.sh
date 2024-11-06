#!/bin/bash

# Verificar se o argumento ServerName foi fornecido
if [ -z "$1" ]; then
    echo "Erro: O parâmetro ServerName não foi fornecido."
    echo "Uso: $0 <ServerName>"
    exit 1
fi

# Configurar o VirtualHost para redirecionar HTTP para HTTPS
echo "<VirtualHost *:80>
    ServerName $SERVER_NAME
    Redirect permanent / https://$SERVER_NAME/
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

# Configurar o VirtualHost para HTTPS
echo "<VirtualHost *:443>
    ServerName $SERVER_NAME
    DocumentRoot /var/www/html/public
    <Directory /var/www/html/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined

    SSLEngine on
    SSLCertificateFile /etc/ssl/certs/tls.crt
    SSLCertificateKeyFile /etc/ssl/certs/tls.key
</VirtualHost>" > /etc/apache2/sites-available/default-ssl.conf

# Habilitar o site SSL
a2ensite default-ssl

# Habilitar módulos rewrite e ssl
a2enmod rewrite ssl

# Habilitar o site padrão
a2ensite 000-default
