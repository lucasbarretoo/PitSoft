<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pessoa;
class UsuariosTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Pessoa::factory(20)->create()->each(function($u){
                                                $u->telefones()->save(Telefone::factory()->make());
                                                $u->telefones()->save(Telefone::factory()->make());
                                            });
    }
}
