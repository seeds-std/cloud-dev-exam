FROM php:8.5-cli-bookworm

EXPOSE 8080

WORKDIR /var/www

RUN apt-get update \
    && apt-get install -y --no-install-recommends unzip \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql

ARG DOCKERIZE_VERSION=v0.16.0
ARG TARGETARCH
RUN curl -fsSL "https://github.com/jwilder/dockerize/releases/download/${DOCKERIZE_VERSION}/dockerize-linux-${TARGETARCH}-${DOCKERIZE_VERSION}.tar.gz" \
    -o /tmp/dockerize.tar.gz \
    && tar -C /usr/local/bin -xzf /tmp/dockerize.tar.gz \
    && rm /tmp/dockerize.tar.gz
