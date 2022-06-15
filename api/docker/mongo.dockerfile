FROM mongo:latest

# metadata
LABEL org.opencontainers.image.authors="Step41 Services <services@step41.com>"

# port
EXPOSE 27017

# set default command
CMD ["mongod", "--port", "27017", "--auth", "--ipv6"]
