<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## READ ME

<h1>Requisitos para rodar o sistema: </h1>
<p> PHP 8 </p>
<p> Laravel 8</p>
<p> PostgreSql</p>
<p> Composer</p>
<p> GIT</p>



<h1>Realizar o clone do projeto https://github.com/lucasbarretoo/PitSoft para uma pasta no seu computador.</h1>

<h1>Após realizar clone alterar a branch do git para a branch develop com o seguinte comando:</h1>
<p> git checkout develop </p>

<h1>OBS.> Importante realizar alteração da branch pois iremos utiliza-la para o desenvolvimendo da aplicação</h1>

<h1>Configurar o banco postgres no arquivo . env na pasta raiz do projeto, caso ele não exista tem um arquivo de exemplo chamado ".env.exemple" basta renomea-lo para ".env" e alterar as seguintes informações:</h1>

<p> DB_CONNECTION=pgsql </p>
<p> DB_HOST=127.0.0.1</p>
<p> DB_PORT=5432</p>
<p> DB_DATABASE=PitSoft</p>
<p> DB_USERNAME=postgres</p>
<p> DB_PASSWORD=admin</p>


<h5>Acessar pasta raiz do projetoa través do terminal e rodar os seguintes comandos:</h5>

<p>composer install</p>
<p>php artisan migrate</p>
<p>php artisan db:seed</p>
