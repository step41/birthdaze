#!/bin/bash

echo "starting mongod"
mongod --port 27017 --bind_ip 0.0.0.0 --auth

echo "executing CMD: '$@'"
exec "$@"

echo "done"
