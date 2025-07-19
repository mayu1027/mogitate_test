# もぎたて

## 環境構築

### Dockerビルド

1.git clone https://github.com/mayu1027/mogitate_test

2.cd mogitate_test

3.docker-compose build

4.docker-compose up -d

5.docker-compose exec app composer install

6.cp .env.example .env

  docker-compose exec app php artisan key:generate


7.docker-compose exec app php artisan migrate

8.docker-compose exec app php artisan db:seed

9.ocker-compose exec app php artisan storage:link

## 使用技術

- PHP 8.0  
- Laravel 10.0  
- MySQL 8.0

## ER図

<img width="1536" height="1024" alt="確認テスト２回目ER図" src="https://github.com/user-attachments/assets/cbc56c38-5cfe-442c-bc8a-53d983843ecc" />

## URL

- 開発環境: [http://localhost/products](http://localhost/products)
- phpMyAdmin: [http://localhost:8080/](http://localhost:8080/)
