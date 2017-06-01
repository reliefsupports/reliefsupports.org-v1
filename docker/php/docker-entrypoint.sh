#!/bin/bash
pushd /var/www/html

# Remove old config
rm -rf .env

# Sort out dependencies.
composer install
composer update

# Config
cp .env.example .env
sed -i 's/DB_HOST=127.0.0.1/DB_HOST=db-server/' .env
sed -i 's/DB_USERNAME=root/DB_USERNAME=reliefuser/' .env
sed -i 's/DB_PASSWORD=root/DB_PASSWORD=reliefpwd/' .env
sed -i 's/DB_PORT=3306/DB_PORT=3306/' .env
sed -i 's/APP_URL=http:\/\/localhost/APP_URL=http:\/\/localhost:8080/' .env

# Generate app keys and do migrations
php artisan key:generate
php artisan migrate
php artisan db:seed || true

# Create folder structure to avoid error
mkdir -p storage/framework/{cache,sessions,views}

chmod -R 777 storage/
chmod 777 bootstrap/cache

popd

exec "$@"
