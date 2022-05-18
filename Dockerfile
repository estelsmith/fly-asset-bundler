FROM alpine:3.15 AS composer
ARG COMPOSER_VERSION=2.3.5

RUN wget https://getcomposer.org/download/${COMPOSER_VERSION}/composer.phar -O /composer

# ---

FROM alpine:3.15

RUN apk --no-cache add php7 php7-phar php7-iconv php7-mbstring php7-json php7-openssl

COPY --from=composer /composer /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
WORKDIR "/data"
