#もぎたて

##環境構築
###Dockerビルド
1.docker-compose build
2.docker-compose up -d
3.docker-compose exec app composer install
4.cp .env.example .env
  docker-compose exec app php artisan key:generate
5.docker-compose exec app php artisan migrate
6.docker-compose exec app php artisan db:seed
7.ocker-compose exec app php artisan storage:link
