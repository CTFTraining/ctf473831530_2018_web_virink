FROM nginx:1.15.0

MAINTAINER Virink <virink@outlook.com>

ADD www /www

RUN apt-get update \
    && apt-get install --no-install-recommends -y php7.0-fpm python3 \
    && sed -i "s/user  nginx;/user  www-data;/" /etc/nginx/nginx.conf \
    && mkdir /run/php \
    && mv /www/nginx.conf /etc/nginx/conf.d/default.conf \
    # Fix PHP
    && sed -i "s/pm.max_children = 5/pm.max_children = 10/" /etc/php/7.0/fpm/pool.d/www.conf \
    && sed -i "s/;request_terminate_timeout = 0/request_terminate_timeout = 5/" /etc/php/7.0/fpm/pool.d/www.conf \
    && mv /www/docker-entrypoint.sh /docker-entrypoint.sh \
    # Permission Control
    && mkdir /www/sandbox \
    && chmod -r /www/sandbox \
    && chmod -r /var/log/nginx \
    && chown -R www-data /www/sandbox \
    && chmod +x /docker-entrypoint.sh \
    && rm -rf /var/lib/apt/lists/*

CMD ["/docker-entrypoint.sh"]
