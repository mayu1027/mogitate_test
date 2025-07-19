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
