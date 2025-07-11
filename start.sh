#!/bin/bash

until nc -z -v -w30 $DB_HOST $DB_PORT
do
  echo "⏳ Menunggu database di $DB_HOST:$DB_PORT..."
  sleep 5
done

echo "✅ Database sudah siap!"

php artisan config:clear
php artisan view:clear
php artisan route:clear

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
