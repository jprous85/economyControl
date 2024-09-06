#!/bin/bash

if [ -f .env ]; then
  export "$(grep -vE "^(#.*|\s*)$" .env)"
fi

DATABASE_CONTAINER=$1
DATABASE_NAME=$2

docker exec "$DATABASE_CONTAINER" mysql --user="$DB_USERNAME" --password="$DB_PASSWORD" -Nse 'SHOW TABLES' 2>/dev/null "$DATABASE_NAME" |
while read -r table;
do
    docker exec "$DATABASE_CONTAINER" mysql --user="$DB_USERNAME" --password="$DB_PASSWORD" \
    -Nse "SET FOREIGN_KEY_CHECKS=0;TRUNCATE TABLE $table;SET FOREIGN_KEY_CHECKS=1;" 2>/dev/null \
    "$DATABASE_NAME";
done
