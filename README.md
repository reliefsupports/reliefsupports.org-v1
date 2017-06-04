# Relief Supports Project

[![Gitter chat](https://badges.gitter.im/gitterHQ/services.png)](https://gitter.im/relief-supports/Lobby)

This is a community-driven Open Source project to support relief support activities conducted by volunteers.
This project was originally created to support flood relief activities in Sri Lanka in May 2017.

We welcome your innovative ideas and suggestions to make a better solution for the community.

http://reliefsupports.org

## How to Contribute

Developers can now initiate discussions through [Gitter](https://gitter.im/relief-supports/Lobby). Before starting to work on an issue, please go through the existing [issues](https://github.com/reliefsupports/reliefsupports.org/issues) and pull requests to make sure no one is working on the same issue at the time.

If you can work on one of the [PRIORITY](https://github.com/reliefsupports/reliefsupports.org/labels/PRIORITY) issues it’ll be great the given the circumstance, but feel free to work on anything you want.

Once you select a task to work on, please mention that in the issue and apply the `In Progress` label for it. If it's a new issue, please [create](https://github.com/reliefsupports/reliefsupports.org/issues/new) an issue and do as same.

See the [milestones](https://github.com/reliefsupports/reliefsupports.org/milestones) page for grasp some idea where the project heading.

Even you can check the [wiki](https://github.com/reliefsupports/reliefsupports.org/wiki) also.

### Setting up the development environment

Generally speaking, you should fork this repository, make changes in your own fork, and then submit a pull-request. Please include necessary information with pull-request

Before send the pull-request, please make sure nothing has broken in the app with the new changes you made.

#### Pull requests

We keep `master` branch only for production release and the working branch is always is `dev`. So please create your pull-requests against `dev` branch and make sure to resolve the conflicts or rebase with `dev`.

There is an intermediate branch as `staging` for the `UAT`.

#### Setting up the development environment

On the project directory;

* Rename `.env.example` file as `.env`
* Update necessary configuration settings on the `.env`

If you wish to use [Docker](https://www.docker.com/) please skip following steps and directly go to [this section](https://github.com/reliefsupports/reliefsupports.org#docker).

* You need to install [composer](https://getcomposer.org/) and [laravel](https://laravel.com/) first. See the laravel [installation guide](https://laravel.com/docs/5.4)
* Change to the project directory
* Run following commands accordingly

```
composer install

// for Mac/Linux
chmod -R 777 storage/
chmod 777 bootstrap/cache
```

##### Docker

* You need to install [Docker](https://www.docker.com/) on your computer first.
* If Docker is running on your computer without any errors, follow the [Docker Testing Guide](docker/README.md).

## License

MIT
