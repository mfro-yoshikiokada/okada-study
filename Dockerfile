# ベースとなるイメージを指定
FROM php:8.2-apache

# インストールに必要なパッケージの追加とComposerのインストール
RUN apt-get update && \
    apt-get install -y vim git zip unzip && \
    docker-php-ext-install pdo_mysql && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"
RUN apt-get install -y nodejs npm
# panique/php-sassの追加
RUN composer require panique/php-sass

# コンテナ内の作業ディレクトリを設定
WORKDIR /var/www/html
