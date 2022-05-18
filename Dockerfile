FROM alpine:3.15 AS composer
ARG COMPOSER_VERSION=2.3.5

RUN wget https://getcomposer.org/download/${COMPOSER_VERSION}/composer.phar -O /composer

# ---

FROM alpine:3.15

RUN apk --no-cache add php7

COPY --from=composer /composer /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
WORKDIR "/data"
