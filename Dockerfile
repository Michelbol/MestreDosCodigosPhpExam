FROM composer

COPY . /srv/app
WORKDIR /srv/app

CMD ["tail", "-f", "/dev/null"]