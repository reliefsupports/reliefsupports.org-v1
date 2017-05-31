# Relief Supports Project

This is a community-driven Open Source project to support relief support activities conducted by volunteers.
This project was originally created to support flood relief activities in Sri Lanka in May 2017.

We welcome your innovative ideas and suggestions to make a better solution for the community.

http://reliefsupports.org

## How to Contribute

Developers can now initiate discussions through [Gitter](https://gitter.im/relief-supports/Lobby). Before starting to work on an issue, please go through the [Waffle](https://waffle.io/reliefsupports/reliefsupports.org) board to make sure that the item is not already in progress. Once you select a task to work on, please drag it to `In Progress`.

### Setting up the development environment

* Clone the project repository as below:

```
git clone git@github.com:reliefsupports/reliefsupports.org.git reliefsupports`
```

* Then, rename `.env.example` file as `.env`

#### Docker

* Install [Docker](https://www.docker.com/) on your computer
* Run following commands accordingly

```
docker-compose build
docker-compose up -d
docker exec -it reliefsupportsorg_php_1 bash
composer update

chmod -R 777 storage/
chmod 777 bootstrap/cache
```

#### On WAMP / XAMPP or other server

* Install `composer`  https://getcomposer.org
* create database `flood`
* change `.env` db configs
* Run following commands accordingly

```
composer install

chmod -R 777 storage/
chmod 777 bootstrap/cache

php artisan key:generate
php artisan migrate
php artisan db:seed

php artisan serve
```

App running at localhost:8000

#### Compiling Assets

```
npm install

// Run all Mix tasks...
npm run dev

// Run all Mix tasks and minify output...
npm run production
```

#### Troubleshooting

```
composer install
php artisan migrate
```

### Pull requests

Send all the PRs to `dev` branch. We keep `master` and `prod` branches only for final releases and all the development works on the `dev`.
