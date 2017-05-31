# Docker Based Test Environment

This is a simple Docker based test environment for the ReliefSupports web development. The setup consists of an Apache container with PHP and MariaDB container. The working directory is mounted to the Apache container inside `/var/www/html` folder.

### Usage

To test a particular change, simply run the following command in Bash.

```bash
bash test-deployment.sh up
```
>In Windows the command to run is `docker-compose --file docker-compose.yml --project-name reliefsupportsorg build` followed by `docker-compose --file docker-compose.yml --project-name reliefsupportsorg up -d`.

This command will start the two containers and expose the site through port `8080`. The required Docker images are downloaded from the [public Docker registry](https://hub.docker.com).

Please allow several minutes (longer if a `compose update` was not done on the source already) to start the server. You can use `docker logs -f reliefsupportsorg_website_1` command to check the server logs. Wait until the line ` Command line: 'apache2 -D FOREGROUND'` appears.

To access the page, navigate to [http://localhost:8080](http://localhost:8080). Any change you do on the source while the containers are running are instantly reflected on the server since it's mounted as a volume.

> NOTE: To reiterate, since it's a writable volume mount, any change you do inside the container will be reflected back in the source as well. Be careful of what you do after `docker exec` inside the container.

To stop the test deployment run the following command.

```bash
bash test-deployment.sh down
```

> Please note currently, db migrations is WIP and will not function correctly. This will soon be fixed.
