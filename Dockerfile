# ベースとなるイメージを指定
FROM php:8.0-apache

RUN apt-get update
RUN apt-get install -y vim
RUN docker-php-ext-install pdo_mysql
# Composerのインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# panique/php-sassの追加
RUN composer require panique/php-sass

# コンテナ内の作業ディレクトリを設定
WORKDIR /var/www/html
