FROM nginx:latest

# metadata
LABEL org.opencontainers.image.authors="Step41 Services <services@step41.com>"

# working directory
WORKDIR /var/www/html

# add content and configs
COPY ./docker/entrypoint.sh /
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf

# group and user perms
RUN groupadd -g 1000 www-data || true \
    && useradd -u 1000 -ms /bin/bash -g www-data www-data || true \
    && chown -R www-data:www-data . \
    && chmod +x /entrypoint.sh 

# set up entrypoint and default command
ENTRYPOINT ["/entrypoint.sh"]

# set default command
CMD ["nginx","-g","daemon off;"]
