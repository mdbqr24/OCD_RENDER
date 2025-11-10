#!/usr/bin/env bash
set -euo pipefail

# Ensure SQLite database exists
if [ ! -f /tmp/database.sqlite ]; then
  touch /tmp/database.sqlite
fi

php artisan migrate --force >/dev/null 2>&1 || true
exec php artisan serve --host 0.0.0.0 --port "${PORT:-8080}"
