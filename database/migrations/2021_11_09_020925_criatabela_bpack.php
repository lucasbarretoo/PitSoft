<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriatabelaBpack extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('bpack', function (Blueprint $table) {
            $table->id('idbpack');
            $table->string('nmbpack');
            $table->string('nmbpack_mostrar')->unique();
            $table->string('type')->nullable();
            $table->string('icon');
            $table->integer('idbpack_pai')->unsigned()->nullable();
            $table->timestamps();
        });

        /**
         * Criando as relações(Chaves estrangeiras) da tabela.
         */
        Schema::table('bpack', function (Blueprint $table) {
            $table->foreign('idbpack_pai')->references('idbpack')->on('bpack');
        });          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('bpack');
    }
}
