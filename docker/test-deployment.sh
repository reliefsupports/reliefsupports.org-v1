#!/bin/bash
self_path=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

compose_file="${self_path}/docker-compose.yml"
project_name="reliefsupportsorg"

op=$1

if [ "$op" == "up" ]; then
  docker-compose --file $compose_file --project-name $project_name build --no-cache

  if [ "$?" != 0 ]; then
    exit $?
  fi

  echo
  echo

  echo "Starting containers..."
  docker-compose --file $compose_file --project-name $project_name up -d
elif [ "$op" == "down" ]; then
  echo "Stopping containers..."
  docker-compose --file $compose_file --project-name $project_name down
else
  echo "Usage: test-deployment.sh [up|down]"
  echo "up - Build and start docker compose deployment"
  echo "down - Take down docker compose deployment"
fi
