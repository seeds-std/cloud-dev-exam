FROM php:8.5-cli-bookworm

EXPOSE 8080

WORKDIR /var/www

RUN apt-get update \
    && apt-get install -y --no-install-recommends unzip \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql

ARG DOCKERIZE_VERSION=v0.16.0
ARG TARGETARCH
RUN arch="${TARGETARCH:-$(dpkg --print-architecture)}"; \
    case "$arch" in \
        amd64|arm64) ;; \
        *) \
            echo "Unsupported architecture for dockerize: $arch (supported: amd64, arm64)" >&2; \
            exit 1 ;; \
    esac; \
    curl -fsSL "https://github.com/jwilder/dockerize/releases/download/${DOCKERIZE_VERSION}/dockerize-linux-${arch}-${DOCKERIZE_VERSION}.tar.gz" \
    -o /tmp/dockerize.tar.gz \
    && tar -C /usr/local/bin -xzf /tmp/dockerize.tar.gz \
    && rm /tmp/dockerize.tar.gz
