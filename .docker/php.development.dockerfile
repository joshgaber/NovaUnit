FROM phpdockerio/php:8.3-fpm
WORKDIR "/srv"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        git \
        php8.3-xdebug \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN addgroup --gid 1000 composer && \
    adduser --disabled-password --ingroup composer --uid 1000 composer

