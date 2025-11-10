#!/usr/bin/env bash
set -o errexit

# Ensure SQLite database exists in the writable temp directory
if [ ! -f /tmp/database.sqlite ]; then
  touch /tmp/database.sqlite
fi

php artisan migrate --force >/dev/null 2>&1 || true
php artisan serve --host 0.0.0.0 --port "$PORT"
