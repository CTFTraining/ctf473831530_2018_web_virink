#!/bin/bash

echo $FLAG > /7h1s_i5_f14g
export FLAG=not_flag
FLAG=not_flag

set -ex

chmod -r /var/log/nginx

service php7.0-fpm restart

service nginx restart

rm /var/run/rsyncd.pid || echo 1

exec rsync --no-detach --daemon --config /etc/rsyncd.conf
