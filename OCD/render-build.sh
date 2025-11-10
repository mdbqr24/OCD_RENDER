#!/usr/bin/env bash
set -o errexit

composer install --no-dev --optimize-autoloader
php artisan key:generate --force
npm install
npm run build
