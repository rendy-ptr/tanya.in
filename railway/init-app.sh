#!/bin/bash

set -e

echo "🚀 Initializing application..."


php artisan migrate --force

php artisan optimize:clear
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache

echo "✅ Ready!"
