#!/bin/bash

set -e

php artisan migrate --force

php artisan optimize:clear

php artisan config:cache

php artisan event:cache

php artisan route:cache

php artisan view:cache

echo "Application initialized successfully."
