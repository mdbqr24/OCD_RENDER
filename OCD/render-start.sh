#!/usr/bin/env bash
set -o errexit

# Ensure the SQLite database file exists when using the attached disk
mkdir -p /opt/render/project/.render/data
if [ ! -f /opt/render/project/.render/data/database.sqlite ]; then
  touch /opt/render/project/.render/data/database.sqlite
fi

php artisan migrate --force >/dev/null 2>&1 || true
php artisan serve --host 0.0.0.0 --port "$PORT"
