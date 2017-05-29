# Relief Supports Project

This is a community-driven Open Source project to support relief support activities conducted by volunteers.
This project was originally created to support flood relief activities in Sri Lanka in May 2017.

We welcome your innovative ideas and suggestions to make a better solution for the community.

http://reliefsupports.org

## Contribution Guide

### Setup the development environment

* Clone the project repository as below:

```
git clone git@github.com:reliefsupports/web-app.git reliefsupports
```

* Then, rename `.env.example` file as `.env`

#### Docker

* Install [Docker](https://www.docker.com/) on your computer
* Run following commands accordingly

```
docker-compose build
docker-compose up -d
docker exec -it reliefsupports_php_1 bash
composer update

chmod -R 777 storage/
chmod 777 bootstrap/cache
```

#### On WAMP / XAMPP or other server

```
composer update
chmod -R 777 storage/
chmod 777 bootstrap/cache
```

### Pull requests

Send all the PRs to `dev` branch. We keep `master` and `prod` branches only for final releases and all the development works on the `dev`.
