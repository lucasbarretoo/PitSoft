<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pessoa;
use \App\Models\Telefone;

class PessoasTableSeed extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Pessoa::factory(20)->create();        
    }
}
