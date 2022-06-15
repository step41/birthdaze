FROM nginx:latest

# metadata
LABEL org.opencontainers.image.authors="Step41 Services <services@step41.com>"

# working directory
WORKDIR /var/www/html

# add content and configs
COPY ./docker/nginx-entrypoint.sh /
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf

# some utility installations
RUN apt-get update && apt-get install -y procps \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y net-tools \
    && apt install -y vim \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# group and user perms
RUN groupmod -g 1000 www-data \
    && usermod -u 1000 -s /bin/bash -g www-data www-data
RUN chown -R www-data:www-data . \
    && chmod +x /nginx-entrypoint.sh 

# set up entrypoint and default command
ENTRYPOINT ["/nginx-entrypoint.sh"]

# set default command
CMD ["nginx","-g","daemon off;"]
