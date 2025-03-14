# ベースとなるイメージを指定
FROM php:8.2-apache

# mod_rewriteを有効にする
RUN a2enmod rewrite

# 必要なパッケージのインストール
RUN apt-get update && apt-get install -y libonig-dev unzip git \
    && docker-php-ext-install pdo_mysql mysqli mbstring

# Composerのインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# Node.jsとnpmのインストール
RUN apt-get install -y nodejs npm

# panique/php-sassの追加
RUN composer require panique/php-sass

# コンテナ内の作業ディレクトリを設定
WORKDIR /var/www/html

# Apacheの設定などを行う場合は、ここに追加
