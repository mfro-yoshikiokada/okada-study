# ベースとなるイメージを指定
FROM php:7.4-apache

# 必要なパッケージのインストール
RUN apt-get update && apt-get install -y libonig-dev unzip git \
    && docker-php-ext-install pdo_mysql mysqli mbstring

# Composerのインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# panique/php-sassの追加
RUN composer require panique/php-sass

# コンテナ内の作業ディレクトリを設定
WORKDIR /var/www/html

# Apacheの設定などを行う場合は、ここに追加
