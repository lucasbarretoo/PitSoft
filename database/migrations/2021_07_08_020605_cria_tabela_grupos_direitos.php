<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaGruposDireitos extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('GRUPOS_DIREITO', function (Blueprint $table) {
            $table->bigIncrements('IDGRUPO_DIREITO');
            $table->string('NMGRUPO_DIREITO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('GRUPOS_DIREITO');
    }
}
