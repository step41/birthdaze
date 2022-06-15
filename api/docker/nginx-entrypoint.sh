#!/bin/bash

echo "generating fresh self-signed certificate for nginx"
openssl req -x509 -nodes -days 3650 -newkey rsa:4096 -sha256 -keyout /etc/nginx/self-signed.key -out /etc/nginx/self-signed.crt -subj "/C=US/ST=Alaksa/L=Anchorage/O=Step41/OU=Services/CN=localhost" -addext "subjectAltName=DNS:localhost,IP:127.0.0.1"
chown root:root /etc/nginx/self-signed.*
chmod 600 /etc/nginx/self-signed.*

echo "starting nginx"
/usr/sbin/nginx -g "daemon off;"

echo "executing CMD: '$@'"
exec "$@"

echo "done"
