#!/bin/sh

# The application should have already been installed in the Dockerfile;
# no need to repeat it.

composer install --no-plugins --no-scripts && composer dump-autoload --optimize && composer run-script post-root-package-install

# Create key material if necessary.
if ! grep -q APP_KEY .env 2>/dev/null ; then
  php artisan key:generate
fi

php artisan migrate

npm install && npm run build

# Run the main container command
exec "$@"