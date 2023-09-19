# base image
FROM php:8.1-apache

# install node -> https://github.com/nodesource/distributions#installation-instructions
RUN apt-get update \
    && apt-get install -y \
    ca-certificates \
    curl \
    gnupg

RUN mkdir -p /etc/apt/keyrings
RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg

# create repository
RUN echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_18.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list

RUN apt-get update \
    && apt-get install -y \
    build-essential \
    # g++ \
    libicu-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libzip-dev \
    libjpeg-dev \
    libwebp-dev \
    libfreetype6-dev \
    zip \
    zlib1g-dev \
    nodejs \
    #npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install \
    intl \
    opcache \
    pdo \
    mysqli \
    pdo_mysql \
    zip
#gd

WORKDIR /var/www/project-manager

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/project-manager
COPY ./apache/default.conf /etc/apache2/sites-enabled/000-default.conf

ARG APP_NAME=${APP_NAME}
ARG APP_ENV=${APP_ENV}
ARG APP_KEY=${APP_KEY}
ARG APP_DEBUG=${APP_DEBUG}
ARG APP_URL=${APP_URL}
ARG LOG_CHANNEL=${LOG_CHANNEL}
ARG LOG_DEPRECATIONS_CHANNEL=${LOG_DEPRECATIONS_CHANNEL}
ARG LOG_LEVEL=${LOG_LEVEL}
ARG DB_CONNECTION=${DB_CONNECTION}
ARG DB_HOST=${DB_HOST}
ARG DB_PORT=${DB_PORT}
ARG DB_DATABASE=${DB_DATABASE}
ARG DB_USERNAME=${DB_USERNAME}
ARG DB_PASSWORD=${DB_PASSWORD}
ARG BROADCAST_DRIVER=${BROADCAST_DRIVER}
ARG CACHE_DRIVER=${CACHE_DRIVER}
ARG FILESYSTEM_DISK=${FILESYSTEM_DISK}
ARG QUEUE_CONNECTION=${QUEUE_CONNECTION}
ARG SESSION_DRIVER=${SESSION_DRIVER}
ARG SESSION_LIFETIME=${SESSION_LIFETIME}
# ARG MEMCACHED_HOST=${127.0.0.1}
# ARG REDIS_HOST=${127.0.0.1}
# ARG REDIS_PASSWORD=${null}
# ARG REDIS_PORT=${6379}
ARG MAIL_MAILER=${MAIL_MAILER}
ARG MAIL_HOST=${MAIL_HOST}
ARG MAIL_PORT=${MAIL_PORT}
ARG MAIL_USERNAME=${MAIL_USERNAME}
ARG MAIL_PASSWORD=${MAIL_PASSWORD}
ARG MAIL_ENCRYPTION=${MAIL_ENCRYPTION}
ARG MAIL_FROM_ADDRESS=${MAIL_FROM_ADDRESS}
ARG MAIL_FROM_NAME=${MAIL_FROM_NAME}
# ARG ${AWS_ACCESS_KEY_ID=}
# ARG ${AWS_SECRET_ACCESS_KEY=}
# ARG AWS_DEFAULT_REGION=${us-east-1}
# ARG ${AWS_BUCKET=}
# ARG AWS_USE_PATH_STYLE_ENDPOINT=${false}
ARG GOOGLE_CLIENT_ID=${GOOGLE_CLIENT_ID}
ARG GOOGLE_CLIENT_SECRET=${GOOGLE_CLIENT_SECRET}
ARG GOOGLE_REDIRECT=${GOOGLE_REDIRECT}
# ARG PUSHER_APP_ID=${PUSHER_APP_ID}
# ARG PUSHER_APP_KEY=${PUSHER_APP_KEY}
# ARG PUSHER_APP_SECRET=${PUSHER_APP_SECRET}
# ARG PUSHER_HOST=${PUSHER_HOST}
# ARG PUSHER_PORT=443
# ARG PUSHER_SCHEME=https
# ARG PUSHER_APP_CLUSTER=mt1
# ARG VITE_PUSHER_APP_KEY=${PUSHER_APP_KEY}
# ARG VITE_PUSHER_HOST=${PUSHER_HOST}
# ARG VITE_PUSHER_PORT=${PUSHER_PORT}
# ARG VITE_PUSHER_SCHEME=${PUSHER_SCHEME}
# ARG VITE_PUSHER_APP_CLUSTER=${PUSHER_APP_CLUSTER}

COPY ./docker-entrypoint.sh /var/www/project-manager/docker-entrypoint.sh
RUN ["chmod", "+x", "./docker-entrypoint.sh"]

RUN mkdir -p /var/www/project-manager/storage/logs
RUN chown -R www-data:www-data /var/www/project-manager/storage

EXPOSE 80
ENTRYPOINT ["./docker-entrypoint.sh"]