#!/bin/bash

set -ex

chmod -r /www/sandbox
chmod -r /var/log

service php7.0-fpm restart

service nginx restart

exec tail -f /var/log/nginx/ctf473831530_web2.log
