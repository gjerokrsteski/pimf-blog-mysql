## pull base image
FROM alpine:3.3

## copy modified PHP files into container
COPY . /pimf-blog-mysql

## set working directory
WORKDIR /pimf-blog-mysql
VOLUME /pimf-blog-mysql

# get packages
RUN apk update && \
    apk upgrade && \
    apk add tzdata && \
    apk add php-fpm && \
    apk add php-common && \
    apk add php-bcmath && \
    apk add php-ctype && \
    apk add php-curl && \
    apk add php-dom && \
    apk add php-json && \
    apk add php-openssl && \
    apk add php-pdo && \
    apk add php-pdo_sqlite && \
    apk add php-pdo_mysql && \
    apk add php-cli && \
    apk add php-phar && \
    apk add php-pcntl && \
    apk add php-intl && \
    apk add php-zlib && \
    apk add openssh && \
    apk add openssl && \
    apk add supervisor && \
    apk del tzdata && \
    rm -rf /var/cache/apk/*

# expose the external port
EXPOSE 1337

# run the PHP's built-in web server
CMD php -S 0.0.0.0:1337