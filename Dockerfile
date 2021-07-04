FROM php:8-cli

WORKDIR /usr/src/app

COPY ./src  /usr/src/app/src
COPY ./vendor  /usr/src/app/vendor
COPY ./public  /usr/src/app/public
COPY ./config /usr/src/app/config

CMD ["php", "-S", "0.0.0.0:8888", "public/index.php"]
