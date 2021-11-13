<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## READ ME

<h3>Requisitos para rodar o sistema: </h3>
<p> PHP 8 </p>
<p> Laravel 8</p>
<p> PostgreSql</p>
<p> Composer</p>
<p> GIT</p>



<h3>Realizar o clone do projeto https://github.com/lucasbarretoo/PitSoft para uma pasta no seu computador.</h3>

<h3>Após realizar clone alterar a branch do git para a branch develop com o seguinte comando:</h3>
<p> git checkout develop </p>

<h3>OBS.> Importante realizar alteração da branch pois iremos utiliza-la para o desenvolvimendo da aplicação</h3>

<h3>Configurar o banco postgres no arquivo . env na pasta raiz do projeto, caso ele não exista tem um arquivo de exemplo chamado ".env.exemple" basta renomea-lo para ".env" e alterar as seguintes informações:</h3>

<p> DB_CONNECTION=pgsql
<br> DB_HOST=127.0.0.1
<br> DB_PORT=5432
<br> DB_DATABASE=PitSoft
<br> DB_USERNAME=postgres
<br> DB_PASSWORD=admin</p>


<h3>Acessar pasta raiz do projetoa través do terminal e rodar os seguintes comandos:</h3>

<p>composer install
<br>php artisan migrate
<br>php artisan db:seed</p>

<h3>Para subir um servidor pelo laravel realizar o seguinte comando após todos os passos anteriores</h3>
<p>php artisan serve<p>