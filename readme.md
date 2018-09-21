<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## SETUP PROJECT

- DB
    - DB_CONNECTION=mysql
    - DB_HOST=127.0.0.1
    - DB_PORT=3306
    - DB_DATABASE=test
    - DB_USERNAME=XXX
    - DB_PASSWORD=XXXX
- composer install
- php artisan migrate:fresh --seed
- php artisan serve
- open http://localhost:8000/products

## GENERATE DOC

- https://github.com/DarkaOnLine/L5-Swagger
- php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
- php artisan l5-swagger:generate
- open this link http://localhost:8000/api/documentation
- There are options to execute any particular url from documentation

ALTERNATIVE

 - open https://editor.swagger.io/
 - paste api-docs.json and check doc
 
 OR
 
 - Download postman collection from doc/testCollections.postman_collection.json
 
