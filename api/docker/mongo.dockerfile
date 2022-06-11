FROM mongo:latest

# metadata
LABEL org.opencontainers.image.authors="Step41 Services <services@step41.com>"

# set default command
CMD ["mongod", "--bind_ip", "0.0.0.0"]
