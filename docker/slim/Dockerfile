FROM php:8.0

EXPOSE 8080

WORKDIR /var/www

RUN apt-get update && apt-get install -y wget
RUN docker-php-ext-install pdo_mysql

ENV DOCKERIZE_VERSION v0.6.1
ARG DOCKERIZE_ARCH=amd64
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-$DOCKERIZE_ARCH-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-linux-$DOCKERIZE_ARCH-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-linux-$DOCKERIZE_ARCH-$DOCKERIZE_VERSION.tar.gz
