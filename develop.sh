#!/usr/bin/env bash

# build and run the mysql container
docker run --name mysql -e MYSQL_ROOT_PASSWORD=my-secret-pw -e MYSQL_DATABASE=db_blog -d mysql:8.0.0

# build and run the app container
docker build -t pimf-blog-app .
docker run --link mysql:mysql --name pimf-blog-app -d -p 1337:1337 pimf-blog-app sh -c "php pimf core:init && php pimf blog:create_blog_table && php -S 0.0.0.0:1337"
