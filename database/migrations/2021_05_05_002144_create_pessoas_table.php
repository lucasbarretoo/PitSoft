<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PESSOAS', function (Blueprint $table) {
            $table->id('IDPESSOA');
            $table->string('NOME');
            $table->string('EMAIL');
            $table->string('ENDERECO');
            $table->string('PAIS');
            $table->string('CIDADE');
            $table->string('ESTADO');
            $table->string('CEP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PESSOAS');
    }
}
