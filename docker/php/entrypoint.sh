#!/bin/sh
# First-run setup for the app container, then hand off to CMD.
set -e
cd /var/www/html

if [ ! -f vendor/autoload.php ]; then
    composer install --no-interaction --prefer-dist
fi

if [ ! -f .env ]; then
    cp .env.example .env
fi

# `php artisan serve` strips most env vars from its worker processes, so the
# values from docker-compose.yml must also be written into .env.
for var in APP_URL DB_CONNECTION DB_HOST DB_PORT DB_DATABASE DB_USERNAME DB_PASSWORD; do
    value=$(printenv "$var" || true)
    [ -n "$value" ] || continue
    if grep -q "^${var}=" .env; then
        sed -i "s|^${var}=.*|${var}=${value}|" .env
    else
        echo "${var}=${value}" >> .env
    fi
done

if ! grep -q '^APP_KEY=base64:' .env; then
    php artisan key:generate --force
fi

# Safe to run on every start: only applies migrations that haven't run yet.
php artisan migrate --force

exec "$@"
