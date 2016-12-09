#!/usr/bin/env bash

# build and run the mysql container
docker build - < Dockerfile.mysql -t pimf-mysql
docker run --name mysql -d -v $(pwd):/app -p 3306:3306 pimf-mysql

# build and run the app container
docker build -t pimf-blog-app .
docker run --link mysql:mysql --name pimf-blog-app -d -p 1337:1337 pimf-blog-app
