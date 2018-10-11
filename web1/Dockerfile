FROM nginx:1.15.0

MAINTAINER Virink <virink@outlook.com>

ADD www /www

ADD flag /7h1s_i5_f14g

RUN apt-get update \
    && apt-get install --no-install-recommends -y php7.0-fpm rsync \
    && sed -i "s/www-data/nobody/" /etc/php/7.0/fpm/pool.d/www.conf \
    && sed -i "s/group = nobody/group = nogroup/" /etc/php/7.0/fpm/pool.d/www.conf \
    && sed -i "s/\/run\/php\/php7.0-fpm.sock/9000/" /etc/php/7.0/fpm/pool.d/www.conf \
    && sed -i "s/;access.log = log\/\$pool.access.log/access.log = \/var\/log\/nginx\/fpm.access.log/" /etc/php/7.0/fpm/pool.d/www.conf \
    && mkdir /run/php \
    && mv /www/nginx.conf /etc/nginx/conf.d/default.conf \
    && mv /www/rsyncd.conf /etc/rsyncd.conf \
    && mv /www/docker-entrypoint.sh /docker-entrypoint.sh \
    && chmod -r /var/log/nginx \
    && chmod +x /docker-entrypoint.sh \
    # root
    && chmod 500 /7h1s_i5_f14g \
    && rm -rf /var/lib/apt/lists/*

CMD ["/docker-entrypoint.sh"]
