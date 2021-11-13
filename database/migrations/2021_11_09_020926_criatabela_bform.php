<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriatabelaBform extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        
        Schema::create('bform', function (Blueprint $table) {
            $table->id('idbform');
            $table->string('nmbform');
            $table->string('nmbform_mostrar')->unique();
            $table->integer('idbpack')->unsigned();
            $table->timestamps();
        });
          
        /**
         * Criando as relações(Chaves estrangeiras) da tabela.
         */
        Schema::table('bpack', function (Blueprint $table) {
            $table->foreign('idbpack')->references('idbpack')->on('bpack');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('bform');
    }
}
