<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## READ ME

Requisitos para rodar o sistema: 
<p> PHP 8 </p>>
<p> Laravel 8</p>>
<p> PostgreSql</p>>
<p> Composer</p>>



Realizar o clone do projeto https://github.com/lucasbarretoo/PitSoft para uma pasta no seu computador.

Após realizar clone alterar a branch do git para a branch develop com o seguinte comando:
<p git checkout develop >

OBS.> Importante realizar alteração da branch pois iremos utiliza-la para o desenvolvimendo da aplicação

Configurar o banco postgres no arquivo . env na pasta raiz do projeto, caso ele não exista tem um arquivo de exemplo chamado ".env.exemple" basta renomea-lo para ".env" e alterar as seguintes informações:

<p> DB_CONNECTION=pgsql </p>
<p> DB_HOST=127.0.0.1</p>
<p> DB_PORT=5432</p>
<p> DB_DATABASE=PitSoft</p>
<p> DB_USERNAME=postgres</p>
<p> DB_PASSWORD=admin</p>


Acessar pasta raiz do projetoa través do terminal e rodar os seguintes comandos:

composer install
php artisan migrate
php artisan db:seed
