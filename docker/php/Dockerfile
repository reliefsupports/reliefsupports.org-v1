FROM php:7-apache

COPY /docker-entrypoint.sh /

# Config
RUN apt-get update && \
    apt-get install -y dos2unix zlib1g-dev curl nano wget git net-tools && \
    docker-php-ext-install pdo pdo_mysql zip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    wget https://phar.phpunit.de/phpunit-5.7.13.phar && \
    chmod +x phpunit-5.7.13.phar && \
    mv phpunit-5.7.13.phar /usr/local/bin/phpunit && \
    echo "export TERM=xterm" >> /etc/bash.bashrc && \
    dos2unix /docker-entrypoint.sh && \
    chmod +x /docker-entrypoint.sh && \
    apt-get --purge remove -y dos2unix && \
    rm -rf /var/lib/apt/lists/* && \
    a2enmod rewrite && \
    sed -i 's/DocumentRoot \/var\/www\/html/DocumentRoot \/var\/www\/html\/public/' /etc/apache2/sites-enabled/000-default.conf && \
    sed -i '13i DirectoryIndex index.html index.php server.php' /etc/apache2/sites-enabled/000-default.conf && \
    sed -i '14i <Directory /var/www/html>' /etc/apache2/sites-enabled/000-default.conf && \
    sed -i '15i Options Indexes FollowSymLinks MultiViews' /etc/apache2/sites-enabled/000-default.conf && \
    sed -i '16i AllowOverride All' /etc/apache2/sites-enabled/000-default.conf && \
    sed -i '17i Require all granted' /etc/apache2/sites-enabled/000-default.conf && \
    sed -i '18i </Directory>' /etc/apache2/sites-enabled/000-default.conf

WORKDIR /var/www/html

EXPOSE 80

ENTRYPOINT ["/docker-entrypoint.sh"]
CMD ["apache2-foreground"]
