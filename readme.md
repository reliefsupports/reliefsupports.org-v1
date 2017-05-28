# reliefsupports

## How to setup locally.

* Clone the repo.
* Rename `.env.example` file as `.env`

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
