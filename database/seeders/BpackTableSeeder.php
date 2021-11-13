<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bpack;
use Illuminate\Support\Facades\DB;
class BpackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into bpack (nmbpack, nmbpack_mostrar, idbpack_pai, icon, created_at, updated_at) values (?, ?, ?, ?, ?, ?)', 
                ['sistema', 'Sistema',null, 'fas fa-cogs', date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
        DB::insert('insert into bpack (nmbpack, nmbpack_mostrar, idbpack_pai, icon, created_at, updated_at) values (?, ?, ?, ?, ?, ?)', 
                ['cadastros', 'Cadastros',null, 'far fa-address-card', date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
   }
}
