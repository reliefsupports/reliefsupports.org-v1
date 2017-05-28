# Relief Supports Project

This is a community driven Open Source project to support relief support activities conduct by volunteers.
This project was originally created to support flood relief activities in Sri Lanka in May 2017.

We welcome your inovative ideas and suggestions to make a better solution for the community.

http://reliefsupports.org

## Contribution Guide

### Setup the development environment

Clone the prject repository as belows;

```
git clone git@github.com:reliefsupports/web-app.git reliefsupports`
```

then, rename `.env.example` file as `.env`

#### Docker

* Install Docker on your computer
* Run following commands accordingly

```
docker-compose build
docker-compose up -d
docker exec -it reliefsupports_php_1 bash
composer update

chmod 777 -R storage/
chmod 777 bootstrap/cache 
```

#### On WAMP / XAMPP or other server

```
composer update
chmod 777 -R storage/
chmod 777 bootstrap/cache
```

### Pull requests

Send all the PRs to `dev` branch. We keep `master` and `prod` branch only for final releases and all the development works on the `dev`.
