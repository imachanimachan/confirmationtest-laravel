# お問い合わせフォーム

## 環境構築
Dockerビルド

  1. git clone:https://github.com/imachanimachan/confirmationtest-laravel
     
  2.docker-compose up -d --build

 Laravel環境構築

  1.docker-compose exec php bash

  2.composer install

  3..env.exampleファイルから.envを作成し、環境変数を変更

  4.php artisan key:generate
  
  5.php artisan　migrate

  6.php artisan db:seed

## 使用技術
  - PHP 8.4.3
   
  - Larave l1
   
  - MySQL mysql:8.0.26

## ER図
![image](https://github.com/user-attachments/assets/93b53869-5a24-4dd5-bdf8-cfd8e9919565)


## URL
  - 開発環境：http://localhost/
    
  - phpMyAdmin:http://localhost:8080/

