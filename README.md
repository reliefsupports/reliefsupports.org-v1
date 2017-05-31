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

```
composer update
chmod -R 777 storage/
chmod 777 bootstrap/cache
```

#### Facebook intergration

Facebook intergration automatically post need requests to a facebook page. A facebook app and administrative rights to a page is required. Using them an access token to page should be generated to put in .env file. The app does not need to be approved if the page admin has has administrative rights to the app.

![](http://d.pr/i/R3WrWj+)

![](http://d.pr/i/othvIj+)
Click "Get Access Token"

![](http://d.pr/i/JL3vnV+)

The access token is short lived one (2 hours), now we need to convert it to long-lived.

Visit below url and it will give you the access token

`https://graph.facebook.com/oauth/access_token?             
    client_id=APP_ID&
    client_secret=APP_SECRET&
    grant_type=fb_exchange_token&
    fb_exchange_token=EXISTING_ACCESS_TOKEN `

Refer to .env.sample to place the credentials.

### Pull requests

Send all the PRs to `dev` branch. We keep `master` and `prod` branches only for final releases and all the development works on the `dev`.
