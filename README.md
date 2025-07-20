# もぎたて

## 環境構築

### Dockerビルド

1.git clone git@github.com:mayu1027/mogitate_test.git

2.docker-compose up -d --build

### Laravel環境構築

1.docker-compose exec php bash

2.composer instal

3. .env.example ファイルから .env を作成し、環境変数を変更

4.php artisan key:generate

5.php artisan migrate

6.php artisan db:seed

## 使用技術

- PHP 8.0  
- Laravel 10.0  
- MySQL 8.0

## ER図

<img width="1536" height="1024" alt="確認テスト２回目ER図" src="https://github.com/user-attachments/assets/cbc56c38-5cfe-442c-bc8a-53d983843ecc" />

## URL

- 開発環境: [http://localhost/products](http://localhost/products)
- phpMyAdmin: [http://localhost:8080/](http://localhost:8080/)
