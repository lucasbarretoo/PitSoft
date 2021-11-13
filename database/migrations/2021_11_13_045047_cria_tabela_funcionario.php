<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function(Blueprint $table) {
            $table->id('idfuncionario');
            $table->string('cargo');
            $table->integer('idpessoa')->unsigned();
        });

         /**
         * Criando as relações(Chaves estrangeiras) da tabela.
         */
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->foreign('idpessoa')->references('idpessoa')->on('pessoas');
        });       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
