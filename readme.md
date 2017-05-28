# reliefsupports

## How to setup locally.

* Clone the repo.
* Create and update `.env` file

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=flood
DB_USERNAME=root
DB_PASSWORD=root
```

### Docker

* Install Docker on your computer
* Run following commands accordingly

```
docker-compose build
docker-compose up -d
docker exec -it floodlk_php_1 bash
composer update

chmod 777 -R storage/
chmod 777 bootstrap/cache 
```

### On WAMP / XAMPP or other server

```
composer update
chmod 777 -R storage/
chmod 777 bootstrap/cache
```
