FROM php:7.0-fpm

WORKDIR /var/www

# install the PHP extensions we need
RUN apt-get update && apt-get install -y dos2unix && apt-get install -y zlib1g-dev curl nano wget git \
    && docker-php-ext-install pdo pdo_mysql zip

# install the composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# install phpunit
RUN wget https://phar.phpunit.de/phpunit-5.7.13.phar && chmod +x phpunit-5.7.13.phar && mv phpunit-5.7.13.phar /usr/local/bin/phpunit

# enable php error logs
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

# enable environment variable forwarding for fpm workers
RUN echo "clear_env = no" >> /usr/local/etc/php-fpm.d/www.conf

# setting up TERM variable
RUN echo "export TERM=xterm" >> /etc/bash.bashrc

COPY /docker-entrypoint.sh /
COPY /docker-entrypoint.d/* /docker-entrypoint.d/

# fixing line endings for windows environments
RUN dos2unix /docker-entrypoint.sh && apt-get --purge remove -y dos2unix && rm -rf /var/lib/apt/lists/*

# When used as base for another Dockerfile this will be run directly after FROM
ONBUILD COPY /docker-entrypoint.d/* /docker-entrypoint.d/

ENTRYPOINT ["/docker-entrypoint.sh"]

RUN chmod +x /docker-entrypoint.sh

CMD ["php-fpm"]
